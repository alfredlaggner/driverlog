<?php

namespace App\Http\Controllers;

use App\DriverLog;
use App\Driver;
use App\Vehicle;
use Illuminate\Http\Request;

class DriverLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $logs = DriverLog::all();
        foreach ($logs as $log) {
            /*				echo $log->driver->first_name . "<br>";*/
        }
        return view('log.index')->with('logs', DriverLog::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 	dd(Driver::all());
        return view('log.create', ['drivers' => Driver::all(), 'vehicles' => Vehicle::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $log = new DriverLog;

        $log->driver_id = $request->get('driver_id');
        $log->save();
        return redirect('driverlogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DriverLog $driverLog
     * @return \Illuminate\Http\Response
     */
    public function show(DriverLog $driverLog)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DriverLog $driverLog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    //    dd($id);
        $driverlog = DriverLog::findOrNew ($id);
        return view('log.edit', compact('driverlog', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\DriverLog $driverLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriverLog $driverLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DriverLog $driverLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverLog $driverLog)
    {
        //
    }
}
