<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public static function GetArticles($amount) {
        return Article::orderBy('created_at', 'desc')->take($amount)->get();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
