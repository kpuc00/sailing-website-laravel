<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public static function GetCourses($amount) {
        return Course::take($amount)->get();
    }

    public static function GetIdName() {
        return Course::all('id', 'name');
    }

    public static function GetAvailable() {
        $available = array();
        foreach(Course::all() as $course) {
            if ($course->coach == null) {
                array_push($available, $course);
            }
        }
        return $available;
    }

    public function coach() {
        return $this->hasOne(Coach::class);
    }
}
