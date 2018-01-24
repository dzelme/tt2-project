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
        $user->personal_code = '020895-67890';
        $user->name = 'Kristaps';
        $user->surname = 'Lietotajs';
        $user->email = 'lietotajs@example.com';
        $user->password = bcrypt('lietotajs');
        $user->save();
        $user->roles()->attach($role_user); //attaches role to user
        
        $doctor = new User();
        $doctor->personal_code = '130185-12345';
        $doctor->name = 'Mairis';
        $doctor->surname = 'Arsts';
        $doctor->email = 'arsts@example.com';
        $doctor->password = bcrypt('arsts');
        $doctor->save();
        $doctor->roles()->attach($role_doctor);
        
        $administrator = new User();
        $administrator->personal_code = '121192-10293';
        $administrator->name = 'Davis';
        $administrator->surname = 'Admins';
        $administrator->email = 'admins@example.com';
        $administrator->password = bcrypt('admins');
        $administrator->save();
        $administrator->roles()->attach($role_administrator);
        
        
    }
}
