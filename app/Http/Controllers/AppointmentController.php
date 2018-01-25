<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use Illuminate\Support\Facades\Input;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $appointments = Appointment::where('patient_id', $request->user()->id)->get();

        return view('appointment', [
            'appointments' => $appointments,
        ]);
        //return view('appointment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'from' => 'required|max:255',
            'to' => 'required|max:255',
            'doctor_id' => 'required|max:30',
        ]);
        /*
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'nerd_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('nerds/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));*/
        
        
        /*$request->user()->appointments()->create([
            'from' => $request->from,
            'to' => $request->to,
        ]);*/
        $appointment = new Appointment;
        $appointment->from = Input::get('from');
        $appointment->to = Input::get('to');
        $appointment->reminder = (Input::get('reminder') === 'on') ? 1 : 0;
        $appointment->patient_id = \Auth::user()->id;
        $appointment->doctor_id = Input::get('doctor_id');
        $appointment->save();

        // redirect
        return redirect('/appointment');
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
        //
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
        // delete
        $appointment = Appointment::find($id);
        $appointment->delete();

        // redirect
        return redirect('/appointment');
    }
}
