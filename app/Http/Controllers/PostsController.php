<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

use Illuminate\Validation\Rule as ValidationRule;

class PostsController extends Controller
{
    //
    public function  index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->simplePaginate(3)->withQueryString(),
            'categories' => Category::latest()->get(),

        ]);
    }

    public function show(Post $post)
    {

        return view('posts.show', ['post' => $post]);
    }
    public function create(Post $post)
    {

        return view('posts.create', ['post' => $post]);
    }

    public function store()
    {


        $attributes =  request()->validate([
            'title' => 'required',
            'slug' => ['required', ValidationRule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', ValidationRule::exists('categories', 'id')],
            'thumbnail' => 'required'

        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');

        Post::create($attributes);

        return redirect('/')->with("success", "Post Uploaded Successfully");
    }
}
