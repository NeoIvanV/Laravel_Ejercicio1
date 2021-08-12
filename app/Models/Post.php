<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
      public string $title;
      public string $resumen;
      public string $date;
      public string $slug;   
      public string $body;   
      
      
      public function __construct($title, $resumen, $date, $slug, $body)
      {
          $this->title = $title;
          $this->resumen = $resumen;
          $this->date = $date;
          $this->slug = $slug;
          $this->body = $body;
          
      }
    

    public static function createFromDocument($document)
    {
         return new self(
           $document->title,
           $document->resumen,
           $document->date,
           $document->slug,
           $document->body()
         );
    }


      public static function all()
    {

      $files = File::files(resource_path("posts/"));
      return array_map(fn($file) => $file->getContents(), $files);            
    }

    public static function find($slug)
    {

        if (!file_exists($path = resource_path("/posts/$slug.html"))) {
            throw new ModelNotFoundException();
            // return redirect('/');
        }  
    
        return cache()->remember("post.{$slug}", 3, fn () =>  file_get_contents($path));
            
    }

}