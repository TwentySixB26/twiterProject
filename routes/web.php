<?php

use App\Http\Controllers\Admin\ComentController as AdminComentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ComentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [DashboardController::class , 'index']);

Route::get('/', [DashboardController::class , 'index'])->name('dashboard');



//except berfungsi agar yang tidak bisa dikendalikan atau dilakukan,maka hal hal teersebut hanya bisa dilakukan ketika sudah auth/login
Route::resource('ideas', controller: IdeaController::class)->except(['index','create','show'])->middleware('auth');

//only berarti bisa dilakukan kapan saja tanpa perlu auth
Route::resource('ideas', controller: IdeaController::class)->only(['show']) ;

//untuk coment
Route::resource('ideas.coments', controller: ComentController::class)->only(['store'])->middleware('auth') ;

Route::resource('users',UserController::class)->only('edit','update')->middleware('auth')  ;
Route::resource('users',UserController::class)->only('show') ;

Route::get('/profile', [UserController::class , 'profile'])->middleware('auth')->name('profile');

Route::get('/terms', function () {
    return view('terms') ;
});

//feed
Route::get('/feed',FeedController::class)->middleware('auth')->name('feed') ;


Route::post('users/{user}/follow',[FollowController::class,'follow'])->middleware('auth')->name('users.follow') ;
Route::post('users/{user}/unfollow',[FollowController::class,'unfollow'])->middleware('auth')->name('users.unfollow') ;


//idea like
Route::post('ideas/{idea}/like',[IdeaLikeController::class,'like'])->middleware('auth')->name('ideas.like') ;
Route::post('ideas/{idea}/unlike',[IdeaLikeController::class,'unlike'])->middleware('auth')->name('ideas.unlike') ;



//admin Page
Route::middleware(['auth', 'can:admin'])->prefix('/admin')->as('admin.')->group(function(){
    Route::get('/',[AdminDashboardController::class,'index'])->name('dashboard') ;
    Route::get('/users',[AdminUserController::class,'index'])->name('users') ;
    Route::get('/ideas',[AdminIdeaController::class,'index'])->name('ideas') ;

    Route::get('/coments',[AdminComentController::class,'index'])->name('coments') ;
    Route::delete('/coments/{coment}/delete', [AdminComentController::class, 'destroy'])->name('delete');
}) ;



// language
Route::get('lang/{lang}', function($lang){
    app()->setLocale($lang) ;
    session()->put('locale',$lang) ;
    return redirect('/') ;
}) ;



