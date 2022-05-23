<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUsersController extends Controller
{
     public function index() {
            $user = User::all();

            return view('admin.users.index', [
                'users' => $user,
            ]);
        }
}
