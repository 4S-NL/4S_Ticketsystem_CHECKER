<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = new Event();
        $event->title = 'NK Atletiek';
        $event->address = 'Dr. Schaepmanlaan 4';
        $event->zip = '4837BW';
        $event->city = 'Breda';
        $event->start_date = '2022-06-25';
        $event->end_date = '2022-06-25';
        $event->service_costs = 0;
        $event->ticket_price = '19.99';
        $event->save();

        $event = new Event();
        $event->title = 'WK Bodybuilding';
        $event->address = 'Jaarbeursplein';
        $event->zip = '3521AL';
        $event->city = 'Utrecht';
        $event->start_date = '2022-03-18';
        $event->end_date = '2022-03-18';
        $event->ticket_price = '25.00';
        $event->service_costs = '19.99';
        $event->save();


    }
}
