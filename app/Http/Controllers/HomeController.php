<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Appointment;
use App\Notifications\NewVisit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function medicalPage()
    {
        $user = User::find(\Auth::user()->id);
        return view('medical', ['user' => $user]);
    }
    
    //show admin's page
    public function adminPage()
    {
        $users = User::all();
        return view('admin', ['users' => $users]);
    }
    
    public function adminAssignRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();  //drops all roles
        if ($request['role_user']) {
            $user->roles()->attach(Role::where('name', 'user')->first());
        }
        if ($request['role_doctor']) {
            $user->roles()->attach(Role::where('name', 'doctor')->first());
        }
        if ($request['role_administrator']) {
            $user->roles()->attach(Role::where('name', 'administrator')->first());
        }
        return redirect()->back();
    }
    
    public function adminEmailReminder()
    {/*
        $tomorrow = Carbon::now()->addDay();
        $appointments = Appointment::where('from', $tomorrow);
        foreach ($appointments as $appointment)
        {*/
            //$user = User::find($appointment->patient_id);
            $user = User::find('10');
            $user->notify(new NewVisit("Tomorrow you have a scheduled doctor's appointment."));/*
        }*/
        return response('Email Sent!', 200);
        //return view('admin');
    }
    
}
