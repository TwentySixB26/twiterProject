<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('auth/register') ;
    }

    public function store() {
        //melakukan validasi
        $validated = request()->validate(
            [
                'name' => 'required|min:3|max:40' ,
                'email' => 'required|email|unique:users,email' ,
                'password' => 'required|min:8|confirmed'
            ]
        ) ;
        //jika lolos validasi maka password akan di enkripsi
        $validated['password'] = Hash::make($validated["password"]) ;

        //create user
        User::create(
            [
                'name' => $validated["name"] ,
                'email' => $validated["email"] ,
                'password' => $validated["password"] ,
            ]
        ) ;

        //redirect
        return redirect('/')->with('success', 'akun sukses dibuat') ;
    }


    public function login() {
        return view('auth/login') ;
    }


    public function authenticate() {
        //melakukan validasi ketika input diketik
        $validated = request()->validate(
            [
                'email' => 'required|email' ,
                'password' => 'required|'
            ]
        ) ;

        //melakukan login/mengecek data yang ingin login ada di database atau tidak
        if (auth()->attempt($validated)) {
            request()->session()->regenerate() ;    //membuat session agar ketika login sukses maka semua data yang berhubungan  dengan yang login tadi bisa diakses
            return redirect('/')->with('success', 'akun sukses Login') ;   //redirect
        }

        //redirect
        return redirect('/')->withErrors([
            'email' => 'no machting user found'
        ]) ;
    }



    public function logout(){
        auth()->logout() ;                      //melakukan logut
        request()->session()->invalidate();     //menghapus semua sesion yang ada
        request()->session()->regenerateToken();    //mengenarate ulang token

        return redirect('/')->with('success', 'logout telah berhasil!') ;
    }
}


