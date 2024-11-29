<?php

namespace App\Http\Controllers;

use App\Models\Idea;
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
        if (request('search')) {
            $ideas = $ideas->where('content', 'like' , '%' . request('search') . '%')  ;
        }

        //mengembalikan data
        return view('dashboard',[
            'ideas' => $ideas->paginate(5),
            //paginate() digunakan untuk berapa data yang ingin ditampilkan per page
        ]) ;
    }

}
