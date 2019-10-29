<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];
    protected $table = 'books';
    public function author() {
        return $this->belongsTo('App\Author');
    }
}
