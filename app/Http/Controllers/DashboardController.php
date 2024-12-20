<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function index(){

        // $idea = new Idea([
        //     'content' => 'test2',
        // ]) ;
        // $idea->save() ;

        //mengambil data di database
        $ideas = Idea::orderBy('created_at' , 'DESC') ;

        //jika ada data yang dikirim lewat form melalui input serach maka akan menimpa variabel $ideas
        // if (request('search')) {
        //     $ideas = $ideas->search(request('search', ''));
        // }


        $ideas->when(request()->has('search'),function($query){
            $query->search(request('search', '')) ;
        }) ;
        // $topUsers = User::withCount('ideas')->orderBy('ideas_count','DESC')->limit(5)->get() ;

        //mengembalikan data
        return view('dashboard',[
            'ideas' => $ideas->paginate(5),
            //paginate() digunakan untuk berapa data yang ingin ditampilkan per page
            // 'top_users' => $topUsers ,
        ]) ;
    }

}
