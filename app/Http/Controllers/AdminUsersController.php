<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUsersController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('admin.users.index', [
            'users' => $user,
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'users' => $user
        ]);
    }

    public function update(User $user, Request $request)
    {
        if ($request->has('banned_at')) {
            $user->banned_at = \Carbon\Carbon::now();
        } else {
            $user->banned_at = null;
        }

        $user->save();

        return redirect()->route('admin.users.list')->with('status', 'U wijziging is opgeslagen');
    }
}
