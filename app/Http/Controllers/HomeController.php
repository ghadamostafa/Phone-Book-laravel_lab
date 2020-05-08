<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;
use Auth;
use App\User;

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
        $phones=Phone::where('user_id', Auth::id())->get();
        $contacts=Auth::user()->contacts;
        // dd($contacts);
        return view('home',['phones' => $phones,'contacts' => $contacts]);
    }
}
