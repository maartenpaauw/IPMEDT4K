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
                'slug'    => str_slug('Onmiddelijk'),
                'name'    => 'Onmiddelijk',
                'urgency' => 1
            ],
            [
                'slug'    => str_slug('Hoog urgent'),
                'name'    => 'Hoog urgent',
                'urgency' => 2
            ],
            [
                'slug'    => str_slug('Urgent'),
                'name'    => 'Urgent',
                'urgency' => 3
            ],
            [
                'slug'    => str_slug('Standaard'),
                'name'    => 'Standaard',
                'urgency' => 4
            ],
            [
                'slug'    => str_slug('Niet urgent'),
                'name'    => 'Niet urgent',
                'urgency' => 5
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
