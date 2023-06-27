<?php

namespace App\Http\Controllers;

use App\Http\Requests\SweepstakesStoreRequest;
use App\Models\Sweepstake;
use Illuminate\Support\Facades\Auth;


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
        return response()->view("sweepstakes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SweepstakesStoreRequest $request)
    {
        Sweepstake::create($request->all());

        return redirect('home')->with('status', 'Sorteio Registado');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sweepstake = Sweepstake::where("id", $id)->first();

        return response()->view("sweepstakes.show", ['sweepstake' => $sweepstake]);
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

        return redirect()->route("home")->with('status', 'Sorteio Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sweepstake = Sweepstake::where("id", $id)->first();

        $sweepstake->delete();


        return redirect()->route("home")->with('status', 'Sorteio Apagado');
    }

    public function draw(Sweepstake $sweepstake)
    {

        if ($sweepstake->user_id === Auth::user()->id) {

            if ($this->winnersCount($sweepstake) < $sweepstake->number_winners) {

                $winners = $sweepstake->participants()->inRandomOrder()->limit($sweepstake->number_winners)->get();

                dd($winners->toArray());
                // $winners->each(function ($winners) {
                //     $winners->update(['awarded_at' => now()]);
                // });

            } else {
                $winners = $sweepstake->participants()->whereNotNull('awarded_at')->get();
            }

           // return response()->view('sweepstakes.show');
        }

        return response("", "403");

    }

    public function winnersCount(Sweepstake $sweepstake)
    {
        return $sweepstake->participants->whereNotNull('awarded_at')->count();
    }

    public function createParticipant(){
        return response()->view('participant.create');
    }
}