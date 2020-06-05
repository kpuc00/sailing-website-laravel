<?php

namespace App\Http\Controllers;

use App\Coach;
use App\Course;
use Illuminate\Http\Request;

class CoachesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coaches = Coach::paginate(20);
        return view('coach.index', compact('coaches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coach = new Coach();
        $courses = Course::whereNull('coachId');
        return view('coach.create', compact('coach','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coach = Coach::create($this->validateRequest());
        $this->storeImage($coach);
        $this->assignCourse($coach);
        return redirect('coach/'.$coach->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function show(Coach $coach)
    {
        return view('coach.show', compact('coach'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function edit(Coach $coach)
    {
        return view('coach.edit', compact('coach'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coach $coach)
    {
        dd($request);
        $coach->update($this->validateRequest());
        $this->storeImage($coach);
        $this->assignCourse($coach);
        return redirect('coach/'.$coach->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coach $coach)
    {
        $coach->delete();
        return redirect('/coach');
    }

    private function validateRequest() {
        return tap(request()->validate([
                'firstName' => 'required',
                'lastName' => 'required',
                'description' => 'required|max:2048',
            ]), function() {
                if(request()->hasFile('image')) {
                    request()->validate([
                        'image' => 'file|image|max:5000',
                    ]);
                }
            },
        );
    }

    private function storeImage($coach) {
        if(request()->has('image')) {
            $coach->update([
                'image' => request()->image->store('coach-img', 'public')
            ]);
        }
    }

    private function assignCourse($coach) {
        if(request()->has('course_id')) {
            $coach->update([
                'course_id' => request()->course_id
            ]);
        }
    }
}
