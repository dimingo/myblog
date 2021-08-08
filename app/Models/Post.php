<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Class Post{


    public $slug;
    
    public $title;

    public $excerpt;

    Public  $body;


    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;

    }

public static function all(){


    

    return collect($files = File::files(resource_path("posts")) )
    ->map(function($file){
        return YamlFrontMatter::parseFile($file);

    })

    ->map(function ($document){

        return new Post(
            $document->title,
            $document->excerpt, 
            $document->date,
            $document->body(),
            $document->slug
    );
        

    });

    

}

    public static function find($slug){
  //of all the blog posts, find the one with a slug that matches the one that was requested

  $posts = static::all();


   return $posts->firstWhere('slug', $slug);     
        
      
    }

}