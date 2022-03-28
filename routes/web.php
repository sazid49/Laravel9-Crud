<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('all-category',[CategoryController::class,'index'] );
Route::get('category-create',[CategoryController::class,'create'] );
Route::post('category-store',[CategoryController::class,'store'] );


Route::get('category-view/{id}',[CategoryController::class,'edit']);
Route::post('category-update/{id}',[CategoryController::class,'update']);
Route::get('category-delete/{id}',[CategoryController::class,'delete'] );

Route::get('user',function()
{

  // App\Models\User::factory()->count(5)->create();


  // App\Models\Address::create([
  //     'user_id'=>1,
  //     'country'=>'bangladesh'
  // ]);
  // App\Models\Address::create([
  //     'user_id'=>2,
  //     'country'=>'Indea'
  // ]);
  // App\Models\Address::create([
  //     'user_id'=>3,
  //     'country'=>'USA'
  // ]);
  // App\Models\Address::create([
  //     'user_id'=>4,
  //     'country'=>'Pakisthan'
  // ]);
  // App\Models\Address::create([
  //     'user_id'=>5,
  //     'country'=>'UK'
  // ]);

  // $users = \App\Models\User::all();
  // return view('user',compact('users'));

  // $addresses = \App\Models\Address::with('user')->get();
  // return view('user',compact('addresses'));

  // App\Models\Post::create([
  //    'title'=>'post 2',
  //    'user_id'=>2,
  // ]);
  // App\Models\Post::create([
  //    'title'=>'post title 3',
  //    'user_id'=>1,
  // ]);

  // $users = \App\Models\User::has('posts','>=',2)->with('posts')->get();
  // $users = \App\Models\User::doesntHave('posts')->with('posts')->get();

  $users = \App\Models\User::whereHas('posts',function($query){
           $query->where('title','like','%title%');
  })->with('posts')->get();
  return view('user',compact('users'));

});

// Route::view('all_data','test');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

                            // Backend
Route::get('login/admim', [AdminController::class, 'adminLoginForm'])->name('admin.login.form');
Route::post('admim/login', [AdminController::class, 'adminLogin'])->name('admin.login');

Route::group(['middleware'=>'admin'],function()
{
  Route::get('admim/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
  Route::get('admim/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
});
