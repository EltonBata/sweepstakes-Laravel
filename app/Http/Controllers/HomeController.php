<?php

namespace App\Http\Controllers;

use App\Models\Sweepstake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $sweepstake_all = Sweepstake::where('user_id', Auth::user()->id)
        ->orderBy('created_at')
        ->get();

        $sweepstake_next = Sweepstake::where('user_id', Auth::user()->id)
            ->with('participants')
            ->where('end_date', '>', now())
            ->limit(3)
            ->orderBy('end_date', 'asc')
            ->get();


        return view(
            'home',
            [
                'sweepstake_all' => $sweepstake_all,
                'sweepstake_next' => $sweepstake_next
            ]
        );
    }
}