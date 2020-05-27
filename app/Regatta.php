<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regatta extends Model
{
    protected $guarded = [];

    public static function GetIdName() {
        return Regatta::all('id', 'name');
    }

    public function competitor() {
        return $this->hasMany(Competitor::class);
    }
}
