<?php

use App\Models\Post;
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

//Route::get('/insert', function () {
//    DB::insert('insert into posts(title, body) values(?, ?)', ['PHP with laravel', 'PHP laravel the best thing happen to php']);
//});
//
//Route::get('/read', function () {
//    $results = DB::select('select * from posts where id = ?', [1]);
//
//    foreach ($results as $result) {
//
//        return $result->title;
//    }
//});
//
//Route::get('/update', function () {
//    $updated = DB::update('update posts set title = "Update title" where id = ?', [1]);
//
//    return $updated;
//});
//
//Route::get('/delete', function () {
//    $deleted = DB::delete('delete from posts where id = ?', [1]);
//
//    return $deleted;
//});

//Retrieve data

Route::get('/find', function () {
    $posts = Post::all();

//       $post = Post::find(2);
    foreach ($posts as $post) {
        return $post->title;
    }
});


Route::get('/findwhere', function (){

    $posts = Post::where('id', 2)->orderBY('id', 'desc')->take(1)->get();

//    $posts = Post::findOrFail(1);
//    $posts = Post::where('users_count', '<', 50)->firstOrFail();

    return $posts;
});

//Insert data
Route::get('/basicinsert', function (){
   $post = new Post;

//   $post = Post::find(2);

   $post->title = "This is from eloquent";
   $post->body = "Eloquent can insert data";
   $post->save();
});


//Create data
Route::get('/create', function (){
    Post::create([

        'title'=>'i created the method',
        'body'=>'wow this is laravel with edwin'
    ]);
});

//Update data
Route::get('/update', function (){
   Post::where('id', 2)->update(
       [
           'title'=>'NEW PHP title',
           'body'=>'I love laravel'
       ]
   );
});

//Delete data
//Route::get('/delete', function (){
//    $post = Post::find(2);
//
//    $post->delete();
//});

Route::get('/delete', function (){

    Post::destroy(3);
//    Post::destroy([4, 5]);
});

Route::get('/softdelete', function (){
   Post::find(1)->delete();
});

Route::get('/readsoftdelete', function (){
   $post = Post::onlyTrashed()->where('id', 1)->get();

   return $post;
});

Route::get('/restore', function (){
   Post::withTrashed()->where('id', 1)->restore();
});

Route::get('/forcedelete', function (){
   Post::withTrashed()->where('id', 1)->forceDelete();
});
