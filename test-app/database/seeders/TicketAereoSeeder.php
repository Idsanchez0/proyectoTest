<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketAereoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('tickets_aereos')->insert([
            'destination' => 'Colombia',
            'airline' => 'Avianca',
            'price' => 205.56,
            'stopover_number' => 5,
            'departure' =>"2022-10-10 09:45",
            'arrival' => "2022-10-10 16:45",
            'duration' => '10 h 4 minutos',
        ]);

        DB::table('tickets_aereos')->insert([
            'destination' => 'Colombia',
            'airline' => 'Avianca',
            'price' => 205.56,
            'stopover_number' => 5,
            'departure' =>"2022-4-15 09:45",
            'arrival' => "2022-4-15 16:45",
            'duration' => '10 h 4 minutos',
        ]);

        DB::table('tickets_aereos')->insert([
            'destination' => 'Colombia',
            'airline' => 'Avianca',
            'price' => 105.56,
            'stopover_number' => 5,
            'departure' =>"2022-4-25 09:45",
            'arrival' => "2022-4-25 16:45",
            'duration' => '10 h 4 minutos',
        ]);

    }
}
