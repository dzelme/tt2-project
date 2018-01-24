<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Appointment;

class AppointmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $appointment = new Appointment();
        $appointment->from = '2014-03-30 13:00:00';
        $appointment->to = '2014-03-30 14:30:00';
        $appointment->reminder = 0;
        $appointment->patient_id = 1;
        $appointment->doctor_id = 2;
        $appointment->save();
        //$user->roles()->attach($role_user); //attaches role to user
        
        $appointment2 = new Appointment();
        $appointment2->from = Carbon::create(2018, 1, 29, 15, 0);
        $appointment2->to = Carbon::create(2018, 1, 29, 15, 30);
        $appointment2->reminder = 1;
        $appointment2->patient_id = 1;
        $appointment2->doctor_id = 2;
        $appointment2->save();

    }
}
