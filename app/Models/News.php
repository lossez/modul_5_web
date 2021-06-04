<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";  

    protected $fillable = [
    'title', 'picture', 'content','is_published',
    ];


    public function authors(){
        return $this->belongsToMany(Author::class,  'author_news');
    }
}
