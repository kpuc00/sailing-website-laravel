<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public static function GetThreeArticles() {
        return Article::orderBy('created_at', 'desc')->take(3)->get();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
