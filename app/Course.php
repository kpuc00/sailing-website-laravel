<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public static function GetIdName() {
        return Course::all('id', 'name');
    }

    public function coach() {
        return $this->hasOne(Coach::class);
    }
}
