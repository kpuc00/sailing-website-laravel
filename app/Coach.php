<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $guarded = [];

    public function course() {
        return $this->belongsTo(Course::class);
    }

}
