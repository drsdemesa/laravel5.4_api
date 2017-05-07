<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Lesson extends Model
{
    protected $fillable = [
        'title', 'body', 'is_displayed'
    ];

    public function tags(){
    	return $this->belongsToMany('App\Tag', 'lesson_tag', 'lesson_id', 'tag_id'); // to override column names
    }
}
