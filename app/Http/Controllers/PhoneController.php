<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;
use Auth;
use App\Http\Requests\PhoneRequest;

class PhoneController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones/create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        // $validatedData = $request->validate([
        //     'phone' => ['required','unique:phones','digits:11','numeric','regex:/^(010|011|012)([1-9]){8}$/u'],

        // ]);
        // $validated = $request->validated();
        $phone=new Phone;
        $phone-> phone = $request -> phone;
        $phone-> user_id=Auth::id();
        $phone->save();
        if($phone -> save())
        {
            return redirect()->route('home')->with('success', 'Phone created successfully');
        }
        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone=Phone::find($id);
        return view('phones/edit',['phone' => $phone ]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request, $id)
    {
        $phone=Phone::find($id);
        $phone-> phone = $request -> phone;
        // $phone-> user_id=Auth::id();
        $phone->save();
        return redirect()->route('home');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone=Phone::find($id);
        $phone->delete();    
        return redirect()->route('home');
        //
    }
}
