<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coment;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    //

    public function index() {
        $totalUsers = User::count() ;
        $totalIdeas = Idea::count() ;
        $totalComments = Coment::count() ;

        return view('admin.dashboard', compact('totalUsers','totalIdeas','totalComments')) ;
    }
}
