<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    protected $guarded = [];

    public function regatta() {
        return $this->belongsTo(Regatta::class);
    }
}
