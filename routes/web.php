<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

//Route::get('/contact', function () {
//    return "this is contact page";
//});
//
//Route::get('/about', function () {
//    return "this is about page";
//});
//
//Route::get('/admin/posts/{id}/{name}', function ($id, $name) {
//    return "this is post number " . $id . " " . $name;
//});
//
//Route::get('/admin/posts/example', array('as'=>'admin.home', function(){
//    $url = route('admin.home');
//
//    return "this url is ". $url;
//}));

//Route::get('/post/{id}', [PostsController::class, 'index']);

//Route::resource('posts', PostsController::class);
//
//Route::get('/contact', [PostsController::class, 'contactView']);
//
//Route::get('/post/{id}/{name}/{age}', [PostsController::class, 'showPost']);


//Database raw sql queries

Route::get('/insert', function () {
    DB::insert('insert into posts(title, body) values(?, ?)', ['PHP with laravel', 'PHP laravel the best thing happen to php']);
});

Route::get('/read', function () {
    $results = DB::select('select * from posts where id = ?', [1]);

    foreach ($results as $result) {

        return $result->title;
    }
});

Route::get('/update', function () {
    $updated = DB::update('update posts set title = "Update title" where id = ?', [1]);

    return $updated;
});

Route::get('/delete', function () {
    $deleted = DB::delete('delete from posts where id = ?', [1]);

    return $deleted;
});
