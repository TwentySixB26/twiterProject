<?php

namespace App\Http\Controllers;

use App\Models\Coment;
use App\Models\Idea;
use Illuminate\Http\Request;

class ComentController extends Controller
{
    public function store(Idea $idea){

        //mendifiniskan table yang ada ditabase
        $coment = new Coment() ;

        //memasukan id yang coment pada variabel coment
        $coment->idea_id = $idea->id ;

        //user id pada tabel yg ada di db diambil dari id user yg sudah login
        $coment->user_id = auth()->id() ;

        //memasukan isi coment ke dalam variabel coment yang diambil dari request yang telah diisi pada textarea
        $coment->coment = request('coment') ;

        //melakukan save atau mengirim data ke database
        $coment->save() ;

        return redirect('/')->with('success', 'Coment Succesfully create!') ;
    }
}
