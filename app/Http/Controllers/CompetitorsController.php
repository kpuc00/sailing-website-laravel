<?php

namespace App\Http\Controllers;

use App\Competitor;
use Illuminate\Http\Request;

class CompetitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competitors = Competitor::all();
        return view('competiotor.index', compact('competitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $competitor = new Competitor();
        return view('competitor.create', compact('competitor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $competitor = Competitor::create($this->validateRequest());
        return redirect('regatta/'.$competitor->regatta->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Competitor  $competitor
     * @return \Illuminate\Http\Response
     */
    public function show(Competitor $competitor)
    {
        return view('competitor.show', compact('competitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Competitor  $competitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Competitor $competitor)
    {
        // Not needed
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Competitor  $competitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competitor $competitor)
    {
        // Not needed
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Competitor  $competitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competitor $competitor)
    {
        // Not needed
    }

    private function validateRequest() {
        return request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'age' => 'required|numeric|min:12|max:99',
            'club' => 'required',
            'regatta_id' =>'required',
        ]);
    }
}
