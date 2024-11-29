<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    //method yang bertugas menangani agar ketika ada data baru yang dikirim
    public function store() {
        //melakukan validasi data
        $validated = request()->validate([
            'content' => 'required|max:240'
        ]) ;

        //user_id akan diambil ketika anda sudah login dan akan diisi sesuai dengan yg sedang login
        $validated["user_id"] = auth()->id();



        //memasukan data ke db
        Idea::create($validated) ;

        //melakukan redirect ketika code sebelumnya dieksekusi entah sukses atau gagal
        return redirect('/')->with('success', 'Post succesfuly create') ;
    }


    // public function destroy(string $id){
    //     //mengambil data melalui models idea
    //     //firstOrfail digunakan untuk ketika kita mempunyai dua halaman dan ada dua data yg sama yaitu a dan ketika mengakses halaman 2 data a dihapus maka yang akan terjadi dihalaman 1 ketika data a akan dihapus akan terjadi page not foud atau 404 karena data a sudah dihapus di halaman 2, jika mengunakan fist() maka akan terjadi eror buka not found dan itu akan sangat merepotkan
    //     $idea = Idea::where('id' , $id)->firstOrFail() ;

    //     //menghapus data
    //     $idea->delete() ;

    //     //redirect ke halaman utama
    //     return redirect('/')->with('success', 'Post succesfuly deleted') ;
    // }


    // =================== cara ke dua untuk delete ==============
    public function destroy(Idea $idea)
    {

        //jika user yang login tidak sesuai dengan postingan yg berleasi dengan idea maka tidak bisa melakukan destroy,edit,update
        if (auth()->id() !== $idea->user_id) {
            abort(404) ;
        }

        // Idea::destroy($idea->id) ;
        $idea->delete() ;
        return redirect('/')->with('success', 'Post succesfuly deletedddd') ;
    }


    public function show(Idea $idea) {

        return view('ideas/show',[
            'idea' => $idea,
        ]) ;
    }


    public function edit(Idea $idea) {

        //jika user yang login tidak sesuai dengan postingan yg berleasi dengan idea maka tidak bisa melakukan destroy,edit,update
        if (auth()->id() !== $idea->user_id) {
            abort(404) ;
        }

        // $editing digunakan untuk digunakan ideaCard.blade.php jika bernilai true maka akan ditampilkan dan jika false maka form tersebut tidak akan ditampilkan
        $editing = true ;
        return view('ideas/show',[
            'idea' => $idea,
            'editing' => $editing
        ]) ;
    }

    public function update(Idea $idea) {

        //jika user yang login tidak sesuai dengan postingan yg berleasi dengan idea maka tidak bisa melakukan destroy,edit,update
        if (auth()->id() !== $idea->user_id) {
            abort(404) ;
        }

        //melakukan validasi data
        request()->validate([
            'content' => 'required|max:240'
        ]) ;

        // data yang telah lolos validasi maka disimpan divariabel
        $idea->content = request()->get('content') ;

        //melakukan save atau mengirim data ke database
        $idea->save() ;

        return redirect('/idea' .'/' . $idea->id)->with('success', 'Post succesfuly updated') ;
    }


}

