<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function signin()
    {
        return view('signin');
    }
    public function signup()
    {
        return view('signup');
    }
}
