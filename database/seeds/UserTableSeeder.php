<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //retrieving the roles
        $role_user = Role::where('name', 'user')->first();
        $role_doctor = Role::where('name', 'doctor')->first();
        $role_administrator = Role::where('name', 'administrator')->first();
        
        $user = new User();
        $user->identification = '020895-67890';
        $user->name = 'Kristaps';
        $user->surname = 'Lietotajs';
        $user->email = 'lietotajs@example.com';
        $user->password = bcrypt('lietotajs');
        $user->alergies = 'big needles';
        $user->gums = 'gingivitis';
        $user->notes = 'needs extra legroom';
        $user->save();
        $user->roles()->attach($role_user); //attaches role to user
        
        $doctor = new User();
        $doctor->identification = '130185-12345';
        $doctor->name = 'Mairis';
        $doctor->surname = 'Arsts';
        $doctor->email = 'arsts@example.com';
        $doctor->password = bcrypt('arsts');
        $doctor->alergies = null;
        $doctor->gums = null;
        $doctor->notes = null;
        $doctor->save();
        $doctor->roles()->attach($role_doctor);
        
        $administrator = new User();
        $administrator->identification = '121192-10293';
        $administrator->name = 'Davis';
        $administrator->surname = 'Admins';
        $administrator->email = 'admins@example.com';
        $administrator->password = bcrypt('admins');
        $user->alergies = null;
        $user->gums = null;
        $user->notes = null;
        $administrator->save();
        $administrator->roles()->attach($role_administrator);
        
        
    }
}
