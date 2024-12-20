<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coment;
use Illuminate\Http\Request;

class ComentController extends Controller
{
    public function index() {
        $comments = Coment::latest()->paginate(5);
        return view('admin.comment.index',compact('comments')) ;
    }

    public function destroy(Coment $coment){
        $coment->delete() ;
        return redirect('/admin/coments')->with('success', 'coment succesfuly delete');
    }

}
