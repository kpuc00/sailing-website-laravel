<?php

namespace App\Http\Controllers;

use App\Coach;
use App\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(20);
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = new Course();
        return view('course.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::create($this->validateRequest());
        $this->storeImage($course);
        $this->assignCoach($course);
        return redirect('course/'.$course->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->update($this->validateRequest());
        $this->storeImage($course);
        $this->assignCoach($course);
        return redirect('course/'.$course->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        Coach::where('course_id', $course->id)->update(['course_id' => null]);
        $course->delete();
        return redirect('home');
    }

    private function validateRequest() {
        return tap(request()->validate([
                'name' => 'required',
                'description' => 'required|min:256|max:2048',
            ]), function() {
                if(request()->has('image')) {
                    request()->validate([
                        'image' => 'file|image|max:5000',
                    ]);
                }
            }
        );
    }

    private function storeImage($course) {
        if(request()->has('image')) {
            $course->update([
                'image' => request()->image->store('course-img', 'public'),
            ]);
        }
    }

    private function assignCoach($course) {
        if(request()->has('coach_id')) {
            Coach::where('id', request()->coach_id)->update([
                'course_id' => $course->id,
            ]);
        }
    }
}
