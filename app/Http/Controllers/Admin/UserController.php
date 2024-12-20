<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    //

    public function index() {
        $users = User::latest()->paginate(5);
        return view('admin.users.index',compact('users')) ;
    }
}




