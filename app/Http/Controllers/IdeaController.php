<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;

class IdeaController extends Controller
{
    //method yang bertugas menangani agar ketika ada data baru yang dikirim
    public function store(CreateIdeaRequest $request) {
        //melakukan validasi data
        $validated = $request->validated();

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
        // if (auth()->id() !== $idea->user_id) {
        //     abort(404) ;
        // }

        $this->authorize('delete', $idea);
        $idea->delete() ;
        return redirect('/')->with('success', 'Post succesfuly deletedddd') ;
    }


    public function show(Idea $idea) {
        // $topUsers = User::withCount('ideas')->orderBy('ideas_count','DESC')->limit(5)->get() ;

        return view('ideas/show',[
            'idea' => $idea,
            // 'top_users' => $topUsers ,
        ]) ;
    }


    public function edit(Idea $idea) {

        //jika user yang login tidak sesuai dengan postingan yg berleasi dengan idea maka tidak bisa melakukan destroy,edit,update
        // if (auth()->id() !== $idea->user_id) {
        //     abort(404) ;
        // }

        $this->authorize('update', $idea);        // $editing digunakan untuk digunakan ideaCard.blade.php jika bernilai true maka akan ditampilkan dan jika false maka form tersebut tidak akan ditampilkan
        $editing = true ;
        return view('ideas/show',[
            'idea' => $idea,
            'editing' => $editing
        ]) ;
    }

    public function update( UpdateIdeaRequest $request,Idea $idea) {

        //jika user yang login tidak sesuai dengan postingan yg berleasi dengan idea maka tidak bisa melakukan destroy,edit,update
        if (auth()->id() !== $idea->user_id) {
            abort(404) ;
        }

        //melakukan validasi data
        $validated = $request->validated() ;

        // data yang telah lolos validasi maka disimpan divariabel
        // $idea->content = request()->get('content') ;

        //melakukan save atau mengirim data ke database
        $idea->update($validated) ;

        return redirect('/idea' .'/' . $idea->id)->with('success', 'Post succesfuly updated') ;
    }


}

