<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function m_customer()
    {
        $alluser = User::get();
        return view("admin.m_customer", compact('alluser'));
    }

    public function nonaktif($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect('/admin/m_customer')->with('error', 'User not found.');
        }

        $user->status = 0;
        $user->save();
        return redirect('/admin/m_customer');
    }

    public function aktif($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect('/admin/m_customer')->with('error', 'User not found.');
        }

        $user->status = 1;
        $user->save();
        return redirect('/admin/m_customer');
    }
}
