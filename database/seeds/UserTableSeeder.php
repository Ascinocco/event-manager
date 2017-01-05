<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin users
        DB::table('users')->insert([
            'name'      => 'Anthony Scinocco',
            'email'     => 'scinocco.a@gmail.com',
            'password'  => bcrypt('P@55w0rd123!'),
            'isAdmin'   => 1
        ]);

        DB::table('users')->insert([
            'name'      => 'Generic Admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('P@55w0rd123!'),
            'isAdmin'   => 1
        ]);

        // standard users
        DB::table('users')->insert([
            'name'      => 'Tim Roth',
            'email'     => 'tim@gmail.com',
            'password'  => bcrypt('P@55w0rd123!'),
            'isAdmin'   => 0
        ]);

        DB::table('users')->insert([
            'name'      => 'Peter Parker',
            'email'     => 'peter@gmail.com',
            'password'  => bcrypt('P@55w0rd123!'),
            'isAdmin'   => 0
        ]);

        DB::table('users')->insert([
            'name'      => 'Roger Smith',
            'email'     => 'roger@gmail.com',
            'password'  => bcrypt('P@55w0rd123!'),
            'isAdmin'   => 0
        ]);

        DB::table('users')->insert([
            'name'      => 'Jules Winfield',
            'email'     => 'jules@gmail.com',
            'password'  => bcrypt('P@55w0rd123!'),
            'isAdmin'   => 0
        ]);
    }
}
