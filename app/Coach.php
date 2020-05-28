<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $guarded = [];

    public static function GetCoaches($amount) {
        return Coach::orderBy('created_at', 'desc')->take($amount)->get();
    }

    public static function GetIdName() {
        return Coach::all('id', 'firstName', 'lastName');
    }

    public static function GetAvailable() {
        return Coach::where('course_id', null)->get();
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

}
