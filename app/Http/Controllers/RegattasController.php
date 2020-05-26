<?php

namespace App\Http\Controllers;

use App\Competitor;
use App\Regatta;
use Illuminate\Http\Request;

class RegattasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regattas = Regatta::all();
        return view('regatta.index', compact('regattas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regatta = new Regatta();
        return view('regatta.create', compact('regatta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Regatta::creat($this->validateRequest());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Regatta  $regatta
     * @return \Illuminate\Http\Response
     */
    public function show(Regatta $regatta)
    {
        $competitors = Competitor::where('regattaId', $regatta->id)->get();
        return view('regatta.show', compact('competitors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Regatta  $regatta
     * @return \Illuminate\Http\Response
     */
    public function edit(Regatta $regatta)
    {
        return view('regatta.edit', compact('regatta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Regatta  $regatta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regatta $regatta)
    {
        $regatta->update($this->validateRequest());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Regatta  $regatta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regatta $regatta)
    {
        Competitor::where('regattaId', $regatta->id)->delete();
        $regatta->delete();
        return redirect('regatta.index');
    }

    private function validateRequest() {
        return request()->validate([
            'name' => 'required',
        ]);
    }
}
