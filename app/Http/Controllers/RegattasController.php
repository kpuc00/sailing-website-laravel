<?php

namespace App\Http\Controllers;

use App\Competitor;
use App\Events\RegattaDeletedEvent;
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
        $regattas = Regatta::paginate(10);
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
        $regatta = Regatta::create($this->validateRequest());
        return redirect('regatta/'.$regatta->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Regatta  $regatta
     * @return \Illuminate\Http\Response
     */
    public function show(Regatta $regatta)
    {
        $competitors = $regatta->competitor()->paginate(20);
        return view('regatta.show', compact('regatta', 'competitors'));
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
        return redirect('regatta/'.$regatta->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Regatta  $regatta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regatta $regatta)
    {
        event(new RegattaDeletedEvent($regatta));

        Competitor::where('regatta_id', $regatta->id)->delete();
        $regatta->delete();
        return redirect('/regatta');
    }

    private function validateRequest() {
        return request()->validate([
            'name' => 'required',
        ]);
    }
}
