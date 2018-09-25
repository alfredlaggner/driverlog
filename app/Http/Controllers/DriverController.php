<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('driver.index')->with('drivers', Driver:: all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('driver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $driver = new Driver;

        $driver->first_name = $request->get('first_name');
        $driver->last_name = $request->get('last_name');
        $driver->license = $request->get('license');
        $driver->save();
        return redirect('drivers');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = \App\Driver::find($id);
        return view('driver.edit',compact('driver','id'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $driver = \App\Driver::find($id);
        $driver->first_name = $request->get('first_name');
        $driver->last_name = $request->get('last_name');
        $driver->license = $request->get('license');
        $driver->save();
        return redirect('drivers');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = \App\Driver::find($id);
        $driver->delete();
        return redirect('drivers')->with('success','Information has been  deleted');    }
}
