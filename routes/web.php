<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
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

    return view('posts',[
        
        'posts' =>Post::with('category')->get()
    
    ]);




});




Route::get('posts/{post}', function ($id) {
    //Find a post by its slug and pass it to a view called post
    $post = post::find($id);



    return view('post', ['post' => Post::findorFail($id)]);
});

Route::get ('categories/{category:slug}', function(Category $category){
    return view('posts', [
        'posts'=>$category->posts
    ]);
});