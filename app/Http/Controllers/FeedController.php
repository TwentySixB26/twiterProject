<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $followingIDs = auth()->user()->followings()->pluck('user_id') ;

        $ideas = Idea::whereIn('user_id' , $followingIDs)->latest() ;

        //jika ada data yang dikirim lewat form melalui input serach maka akan menimpa variabel $ideas
        // if (request('search')) {
        //     $ideas = $ideas->search(request('search', ''));
        // }

        $ideas->when(request()->has('search'),function($query){
            $query->search(request('search', '')) ;
        }) ;


        //mengembalikan data
        return view('dashboard',[
            'ideas' => $ideas->paginate(5),
            //paginate() digunakan untuk berapa data yang ingin ditampilkan per page
        ]) ;

    }
}
