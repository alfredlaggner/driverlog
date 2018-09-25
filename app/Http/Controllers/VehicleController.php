<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehicle.index')->with('vehicles', Vehicle::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = new Vehicle;

        $vehicle->model = $request->get('model');
        $vehicle->make = $request->get('make');
        $vehicle->plate = $request->get('plate');
        $vehicle->save();
        return redirect('vehicles');
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
        $vehicle = \App\Vehicle::find($id);
        return view('vehicle.edit',compact('vehicle','id'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicle = \App\Vehicle::find($id);
        $vehicle->model = $request->get('model');
        $vehicle->make = $request->get('make');
        $vehicle->plate = $request->get('plate');
        $vehicle->save();
        return redirect('vehicles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = \App\Vehicle::find($id);
        $vehicle->delete();
        return redirect('vehicles')->with('success','Information has been  deleted');    
    }
}
