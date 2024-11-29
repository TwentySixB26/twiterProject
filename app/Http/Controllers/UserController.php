<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(?User $user)
    {
        if (!$user) {
            abort(404, 'User not found');
        }

        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true ;
        $ideas = $user->ideas()->paginate(5) ;
        return view('users.edit',compact('user','editing','ideas')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $validated = request()->validate([
            'name' => 'required|min:3|max:40' ,
            'bio' => 'nullable|min:1|max:255',
            'image' => 'image'
        ]) ;

        if (request()->has('image')) {
            //untuk memasukan img ke file storage
            $imagePath = request()->file('image')->store('profile','public') ;

            //validated['image'] di isi dengan imagePath untuk namanya, jadi hasilnya nama di db nya adalah storage/gambar yang dikirm.jpg
            $validated['image'] = $imagePath ;

            Storage::disk('public')->delete($user->image ?? '') ;
        } ;

        $user->update($validated) ;
        return redirect('/profile') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profile(){
        return $this->show(auth()->user()) ;

    }



}



