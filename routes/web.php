<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-user', function () {
 
    $user = new User;
    $user -> name ='Marjorie Navaja';
    $user -> email ='marjorienavaja@gmail.com';
    $user -> password = '123456';
    

    $user->save();

});

Route::get('/create', function(){
        $user = User::findOrFail(2);

        $post = new Post(['title'=>'Sample title in Post 2','body'=>'Sample Description in post 2']);

        $user->posts()->save($post);

    });

Route::get('/read', function(){
        $user = User::findOrFail(1);

    
       $posts = $user->posts;

       foreach($posts as $post){
        echo $post->title;
        echo '<br>';
       }
});

Route::get('/update',function(){
    $user = User::findOrFail(1);
    $user->posts()->where('id',1)->update(['title'=>'I Love Laravel','body'=>"this is Awesome"]);
});

Route::get('/delete',function(){
        $user = User::find(1);
        $user->posts()->where('id', 1)->delete();
});



