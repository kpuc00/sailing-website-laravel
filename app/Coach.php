<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $guarded = [];

    public static function GetIdName() {
        return Coach::all('id', 'firstName', 'lastName');
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

}
