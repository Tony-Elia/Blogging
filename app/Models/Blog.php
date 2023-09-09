<?php

namespace App\Models;

use Database\Factories\BlogFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = ['title', 'body', 'author_id', 'date'];
    protected static function newFactory(): Factory{
        return BlogFactory::new();
    }

    public function user() {
        return $this->belongsTo(User::class, 'author_id');
    }
}
