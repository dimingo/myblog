@extends('layout')

@section('content')
    @foreach($posts as $post)

    <article>

        <a href="/posts/{{ $post->slug}}">
            <h1> {!!$post->title!!} </h1>
        </a>


        <p>
            By  <a href="#">{{$post->user->name}}</a>
            <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>


        <p>
            {{ $post->excerpt }}</h1>
        </div>



    </article>
    @endforeach
    @endsection