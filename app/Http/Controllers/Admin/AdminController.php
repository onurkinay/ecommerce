<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Assuming you have a LoginRequest for validation

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
        $data = $request->all();
        $service = new \App\Services\Admin\AdminService;
        $loginStatus = $service->login($data);

        if ($loginStatus) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error_message', 'Invalid credentials');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
