<?php

use Illuminate\Database\Seeder;

class EventUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_user')->insert([
            'event_id'      => '1',
            'user_id'     => '3',
            'owner_id'  => '6'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '1',
            'user_id'     => '4',
            'owner_id'  => '6'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '2',
            'user_id'     => '4',
            'owner_id'  => '5'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '2',
            'user_id'     => '6',
            'owner_id'  => '5'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '2',
            'user_id'     => '6',
            'owner_id'  => '5'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '2',
            'user_id'     => '6',
            'owner_id'  => '5'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '3',
            'user_id'     => '4',
            'owner_id'  => '3'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '3',
            'user_id'     => '5',
            'owner_id'  => '3'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '4',
            'user_id'     => '5',
            'owner_id'  => '3'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '4',
            'user_id'     => '5',
            'owner_id'  => '3'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '5',
            'user_id'     => '3',
            'owner_id'  => '4'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '5',
            'user_id'     => '6',
            'owner_id'  => '4'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '6',
            'user_id'     => '5',
            'owner_id'  => '4'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '6',
            'user_id'     => '6',
            'owner_id'  => '5'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '7',
            'user_id'     => '5',
            'owner_id'  => '6'
        ]);

        DB::table('event_user')->insert([
            'event_id'      => '7',
            'user_id'     => '4',
            'owner_id'  => '6'
        ]);
    }
}
