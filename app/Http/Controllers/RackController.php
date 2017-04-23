<?php

namespace App\Http\Controllers;

use App\Pickup;
use App\Rack;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Product;

class RackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
		$racks = Rack::all();


        return view('rack.index', compact('racks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rack.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Rack::Create(request(['id', 'description']));
        return redirect('/rack/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function show(Rack $rack)
    {
        //
        $products = $rack->products;
        return view('rack.show', compact('rack', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function edit(Rack $rack)
    {
        //
        return view('rack.edit', compact('rack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rack = Rack::find(request('id'));
        $rack->id = request('id');
        $rack->description = request('description');
        $rack->save();
        return redirect('/rack/' . request('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rack $rack)
    {
        //
        Rack::destroy($rack->id);
        return redirect('/rack/index');
    }

}
