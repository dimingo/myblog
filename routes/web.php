<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\Data\SymfonyYamlFrontMatterParser;
use PhpParser\Node\Stmt\Return_;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Translation\Dumper\YamlFileDumper;

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


    $posts = Post::all();

    
    return view('posts', ['posts' => $posts]);



    // return view('posts');
});




Route::get('posts/{post}', function ($slug) {
    //Find a post by its slug and pass it to a view called post
  

    return view('post', ['post' =>Post::find($slug)]);
})->where('post', '[A-z_\-]+');
