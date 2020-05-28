<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regatta extends Model
{
    protected $guarded = [];

    public static function GetIdName() {
        return Regatta::all('id', 'name');
    }

    public static function GetById($regatta_id) {
        return Regatta::find($regatta_id);
    }

    public function competitor() {
        return $this->hasMany(Competitor::class);
    }
}
