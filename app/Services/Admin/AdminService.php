<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;

class AdminService
{
    public function login($data)
    {

        if (Auth::guard('admin')->attempt(
            [
                'email' => $data['email'],
                'password' => $data['password'],
            ]
        )) {

            if (! empty($data['remember'])) {
                setcookie('email', $data['email'], time() + 3600); // 1 hour
                setcookie('password', $data['password'], time() + 3600); // 1 hour
                setcookie('remember', '1', time() + 3600); // 1 hour
            } else {
                setcookie('email', ''); // Delete cookie
                setcookie('password', ''); // Delete cookie
                setcookie('remember', ''); // Delete cookie
            }

            return 1;
        }

        return 0;
    }
}
