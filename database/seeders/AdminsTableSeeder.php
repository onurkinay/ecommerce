<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');
        $admin = new Admin;
        $admin->name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = $password;
        $admin->role = 'admin';
        $admin->mobile = '1234567890';
        $admin->image = null;
        $admin->status = 1;
        $admin->save();
    }
}
