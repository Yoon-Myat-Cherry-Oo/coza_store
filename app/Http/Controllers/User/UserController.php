<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('User.index');
    }

    public function quickView(){
        return view('partials.modal');
    }
}
