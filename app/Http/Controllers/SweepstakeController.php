<?php

namespace App\Http\Controllers;

use App\Http\Requests\SweepstakesStoreRequest;
use App\Models\Sweepstake;
use Illuminate\Http\Request;

class SweepstakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("sweepstakes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SweepstakesStoreRequest $request)
    {
        Sweepstake::create($request->all());

        return redirect()->route("home")->with('status', 'Sorteio Registado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sweepstake $sweepstake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sweepstake = Sweepstake::where('id', $id)->first();

        return response()->view('sweepstakes.edit', ['sweepstake' => $sweepstake]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SweepstakesStoreRequest $request, $id)
    {
        $sweepstake = Sweepstake::where('id', $id)->first();
        
        $sweepstake->update($request->all());

        return redirect()->route("home")->with('staus', 'Sorteion Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sweepstake $sweepstake)
    {
        //
    }
}