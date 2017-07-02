<?php

use Illuminate\Database\Seeder;
use IPMEDT4K\Models\Triage;

class TriagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // The triages.
        $triages = [
             [
                'slug'                 => str_slug('Onmiddelijk'),
                'name'                 => 'Onmiddelijk',
                'description'          => 'Patiënten met een rood (urgent) triage worden gelijk in behandeling genomen.',
                'urgency'              => 1,
                'maximum_waiting_time' => '00:00'
            ],
            [
                'slug'                 => str_slug('Hoog urgent'),
                'name'                 => 'Hoog urgent',
                'description'          => 'U krijgt voorrang op patiënten die voorzien zijn van een minder urgent triage dan uzelf, wel wordt u onder patiënten geplaatst die een hogere triage urgentie hebben dan u. Patiënten met een oranje (hoog urgent) triage hebben een maximale wachttijd van 10 minuten, deze maximale wachttijd kan alleen overschreden worden door patiënten met een rood (onmiddellijk) triage.',
                'urgency'              => 2,
                'maximum_waiting_time' => '00:10'
            ],
            [
                'slug'                 => str_slug('Urgent'),
                'name'                 => 'Urgent',
                'description'          => 'U krijgt voorrang op patiënten die voorzien zijn van een minder urgent triage dan uzelf, wel wordt u onder patiënten geplaatst die een hogere triage urgentie hebben dan u. Patiënten met een geel (urgent) triage hebben een maximale wachttijd van 60 minuten, deze maximale wachttijd kan alleen overschreden worden door patiënten met een rood (onmiddellijk) triage.',
                'urgency'              => 3,
                'maximum_waiting_time' => '01:00'
            ],
            [
                'slug'                 => str_slug('Standaard'),
                'name'                 => 'Standaard',
                'description'          => 'U krijgt voorrang op patiënten die voorzien zijn van een minder urgent triage dan uzelf, wel wordt u onder patiënten geplaatst die een hogere triage urgentie hebben dan u. Patiënten met het groene (normaal) triage hebben een maximale wachttijd van 120 minuten, deze maximale wachttijd kan alleen overschreden worden door patiënten met een rood (onmiddellijk) triage of een oranje (hoog urgent) triage.',
                'urgency'              => 4,
                'maximum_waiting_time' => '02:00'
            ],
            [
                'slug'                 => str_slug('Niet urgent'),
                'name'                 => 'Niet urgent',
                'description'          => 'U wordt onder patiënten geplaatst die een hogere triage urgentie hebben dan u. Patiënten met het blauwe (niet urgent) triage hebben een maximale wachttijd van 240 minuten, deze maximale wachttijd kan alleen overschreden worden door patiënten met een rood (onmiddellijk) triage of een oranje (hoog urgent) triage.',
                'urgency'              => 5,
                'maximum_waiting_time' => '04:00'
            ]
        ];

        // Loop trough each triage.
        foreach ($triages as $triage)
        {
            // Create the triage.
            Triage::create($triage);
        }

    }
}
