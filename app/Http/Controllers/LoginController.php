<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // this is function is responsible for rendering login page
    public function create(Request $request) {
        return view("admin.auth.login");
    }
}
