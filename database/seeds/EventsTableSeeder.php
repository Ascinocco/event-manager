<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'title'         => 'Office Christmas Party',
            'description'   => 'Fun xmas festivities',
            'location'      => '123 Santas lane',
            'attire'        => 'casual',
            'date'          => '2017-03-23',
            'owner'         => 3
        ]);

        DB::table('events')->insert([
            'title'         => 'IT update meeting',
            'description'   => 'Discuss this weeks updates',
            'location'      => '98 IT road',
            'attire'        => 'semi formal',
            'date'          => '2017-09-19',
            'owner'         => 3
        ]);

        DB::table('events')->insert([
            'title'         => 'AA Meeting',
            'description'   => 'Dont do drugs',
            'location'      => '123 sad lane',
            'attire'        => 'casual',
            'date'          => '2017-02-03',
            'owner'         => 4
        ]);

        DB::table('events')->insert([
            'title'         => 'Band Practice',
            'description'   => 'Lets play some new songs',
            'location'      => '67 Santa Monica Blvrd',
            'attire'        => 'casual',
            'date'          => '2017-11-28',
            'owner'         => 5
        ]);

        DB::table('events')->insert([
            'title'         => 'Chemistry Class',
            'description'   => 'Assignment one is due',
            'location'      => 'Albert Wesker High',
            'attire'        => 'casual',
            'date'          => '2017-04-12',
            'owner'         => 5
        ]);

        DB::table('events')->insert([
            'title'         => 'Design Fart Blaster',
            'description'   => 'Please brings farts for us to test the blaster with',
            'location'      => 'The oh god why institute for technology',
            'attire'        => 'casual',
            'date'          => '2017-03-04',
            'owner'         => 6
        ]);

        DB::table('events')->insert([
            'title'         => 'Physics Class',
            'description'   => 'Rocket Assignment Due',
            'location'      => 'Leon S Kennedy Road',
            'attire'        => 'casual',
            'date'          => '2017-12-10',
            'owner'         => 6
        ]);
    }
}
