<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    public function __invoke(Request $request) {
        return "Welcome to our homepage";
    }

    public function action(Request $request) {
        $user = User::create($request->only('email', 'name', 'password'));
    }
}