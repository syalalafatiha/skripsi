<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            Session::put('user_id', $user->id);
            Session::put('user_nama', $user->nama);
            Session::put('user_role', $user->role);

            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'user') {
                return redirect()->route('user.dashboard');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
