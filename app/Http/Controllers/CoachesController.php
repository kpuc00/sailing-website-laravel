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
        $coaches = Coach::all();
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
        return redirect('coach.index');
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
        $courses = Course::whereNull('coachId');
        return view('coach.edit', compact('coach', 'courses'));
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
        $coach->update($this->validateRequest());
        $this->storeImage($coach);
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
        return redirect('coach.index');
    }

    private function validateRequest() {
        return tap(request()->validate([
                'firstName' => 'required',
                'lastName' => 'required',
                'description' => 'required|max:1024k',
                'courseId' => 'nullable',
            ]), function() {
                if(request()->hasFile('image')) {
                    request()->validate([
                        'image' => 'file|image|max:5000',
                    ]);
                }
            }
        );
    }

    private function storeImage($coach) {
        if(request()->has('image')) {
            $coach->update([
                'image' => request()->image->store('coach-img', 'public')
            ]);
        }
    }
}
