<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;


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
    return view('User.index');
});
Route::get('/home', function () {
    return view('User.index');
})->name('home');
Route::get('/shop', function () {
    return view('User.shop');
})->name('shop');
Route::get('/blog', function () {
    return view('User.blog');
})->name('blog');
Route::get('/feature', function () {
    return view('User.feature');
})->name('feature');
Route::get('/about', function () {
    return view('User.about');
})->name('about');
Route::get('/contact', function () {
    return view('User.contact');
})->name('contact');


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if(Auth::check()){
            if(Auth::user()->user_type == 'admin'){
                return redirect()->route('admin.index');
            }
            else if(Auth::user()->user_type == 'user'){
                return redirect()->route('user.index');
            }
        }
    })->name('dashboard');
});



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::resource('category','CategoryController');
    Route::resource('color','ColorController');
    Route::resource('size','SizeController');
    Route::resource('product','ProductController');

    // Route::resource('entry','EntryController');

});

Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth']], function () {
    Route::get('/', 'UserController@index')->name('index');

});
Route::get('quickView','User\UserController@quickView')->name('quickView');
