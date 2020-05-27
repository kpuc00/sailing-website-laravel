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
        $courses = Course::all();
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
        $coaches = Coach::whereNull('courseId'); //Change this line
        return view('course.create', compact('course', 'coaches'));
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
        return redirect('course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $coach = $course->coach;
        return view('course.show', compact('course', 'coach'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $coaches = Coach::whereNull('courseId');
        return view('course.edit', compact('coaches'));
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
        return redirect('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect('course.index');
    }

    private function validateRequest() {
        return tap(request()->validate([
                'name' => 'required',
                'description' => 'required',
                'coachId' => 'nullable',
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
}
