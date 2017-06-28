<?php

use Illuminate\Database\Seeder;
use IPMEDT4K\Models\Triage;
use IPMEDT4K\Models\TriageComparison;

class TriageComparisonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comparisons = [
            [
                'triage_a_id' => Triage::nietUrgent()->id,
                'triage_b_id' => Triage::nietUrgent()->id,
                'description' => 'Patiënten die net als u een blauwe triage hebben worden tegenover elkaar op volgorde van binnenkomst geholpen.'
            ],
            [
                'triage_a_id' => Triage::nietUrgent()->id,
                'triage_b_id' => Triage::standaard()->id,
                'description' => 'Patiënten die van een groene triage zijn voorzien worden bij binnenkomst voor u ingedeeld. Bij het benaderen van uw maximum wachttijd wordt u voor wel voor patiënten met een groene triage ingedeeld.'
            ],
            [
                'triage_a_id' => Triage::nietUrgent()->id,
                'triage_b_id' => Triage::urgent()->id,
                'description' => 'Patiënten die van een gele triage zijn voorzien worden bij binnenkomst voor u ingedeeld. Bij het benaderen van uw maximum wachttijd wordt u wel voor patiënten met een gele triage ingedeeld.'
            ],
            [
                'triage_a_id' => Triage::nietUrgent()->id,
                'triage_b_id' => Triage::hoogUrgent()->id,
                'description' => 'Patiënten die van een oranje triage zijn voorzien worden bij binnenkomst voor u ingedeeld. Door patiënten met de oranje triage kan het zijn dat uw maximum wachttijd wordt overschreden.'
            ],
            [
                'triage_a_id' => Triage::nietUrgent()->id,
                'triage_b_id' => Triage::onmiddelijk()->id,
                'description' => 'Patiënten die van een rode triage zijn voorzien worden bij binnenkomst voor u ingedeeld. Door patiënten met de rode triage kan het zijn dat uw maximum wachttijd wordt overschreden.'
            ],
            [
                'triage_a_id' => Triage::standaard()->id,
                'triage_b_id' => Triage::nietUrgent()->id,
                'description' => 'Bij binnenkomst wordt u boven mensen met een blauwe triage geplaatst, een uitzondering hiervoor is als zij hun maximum wachttijd benaderen.'
            ],
            [
                'triage_a_id' => Triage::standaard()->id,
                'triage_b_id' => Triage::standaard()->id,
                'description' => 'Patiënten die net als u een groene triage hebben worden tegenover elkaar op volgorde van binnenkomst geholpen.'
            ],
            [
                'triage_a_id' => Triage::standaard()->id,
                'triage_b_id' => Triage::urgent()->id,
                'description' => 'Patiënten die van een gele triage zijn voorzien worden bij binnenkomst voor u ingedeeld. Bij het benaderen van uw maximum wachttijd wordt u wel voor patiënten met een gele triage ingedeeld.'
            ],
            [
                'triage_a_id' => Triage::standaard()->id,
                'triage_b_id' => Triage::hoogUrgent()->id,
                'description' => 'Patiënten die van een oranje triage zijn voorzien worden bij binnenkomst voor u ingedeeld. Door patiënten met de oranje triage kan het zijn dat uw maximum wachttijd wordt overschreden.'
            ],
            [
                'triage_a_id' => Triage::standaard()->id,
                'triage_b_id' => Triage::onmiddelijk()->id,
                'description' => 'Patiënten die van een rode triage zijn voorzien worden bij binnenkomst voor u ingedeeld. Door patiënten met de rode triage kan het zijn dat uw maximum wachttijd wordt overschreden.'
            ],
            [
                'triage_a_id' => Triage::urgent()->id,
                'triage_b_id' => Triage::nietUrgent()->id,
                'description' => 'Bij binnenkomst wordt u boven mensen met een blauwe triage geplaatst, een uitzondering hiervoor is als zij hun maximum wachttijd benaderen.'
            ],
            [
                'triage_a_id' => Triage::urgent()->id,
                'triage_b_id' => Triage::standaard()->id,
                'description' => 'Bij binnenkomst wordt u boven mensen met een groene triage geplaatst, een uitzondering hiervoor is als zij hun maximum wachttijd benaderen.'
            ],
            [
                'triage_a_id' => Triage::urgent()->id,
                'triage_b_id' => Triage::urgent()->id,
                'description' => 'Patiënten die net als u een gele triage hebben worden tegenover elkaar op volgorde van binnenkomst geholpen.'
            ],
            [
                'triage_a_id' => Triage::urgent()->id,
                'triage_b_id' => Triage::hoogUrgent()->id,
                'description' => 'Patiënten die van een oranje triage zijn voorzien worden bij binnenkomst voor u ingedeeld. Door patiënten met de oranje triage kan het zijn dat uw maximum wachttijd wordt overschreden.'
            ],
            [
                'triage_a_id' => Triage::urgent()->id,
                'triage_b_id' => Triage::onmiddelijk()->id,
                'description' => 'Patiënten die van een rode triage zijn voorzien worden bij binnenkomst voor u ingedeeld. Door patiënten met de rode triage kan het zijn dat uw maximum wachttijd wordt overschreden.'
            ],
            [
                'triage_a_id' => Triage::hoogUrgent()->id,
                'triage_b_id' => Triage::nietUrgent()->id,
                'description' => 'Bij binnenkomst wordt u boven mensen met een blauwe triage geplaatst.'
            ],
            [
                'triage_a_id' => Triage::hoogUrgent()->id,
                'triage_b_id' => Triage::standaard()->id,
                'description' => 'Bij binnenkomst wordt u boven mensen met een groene triage geplaatst.'
            ],
            [
                'triage_a_id' => Triage::hoogUrgent()->id,
                'triage_b_id' => Triage::urgent()->id,
                'description' => 'Bij binnenkomst wordt u boven mensen met een gele triage geplaatst.'
            ],
            [
                'triage_a_id' => Triage::hoogUrgent()->id,
                'triage_b_id' => Triage::hoogUrgent()->id,
                'description' => 'Patiënten die net als u een oranje triage hebben worden tegenover elkaar op volgorde van binnenkomst geholpen.'
            ],
            [
                'triage_a_id' => Triage::hoogUrgent()->id,
                'triage_b_id' => Triage::onmiddelijk()->id,
                'description' => 'Patiënten die van een rode triage zijn voorzien worden bij binnenkomst voor u ingedeeld. Door patiënten met de rode triage kan het zijn dat uw maximum wachttijd wordt overschreden.'
            ],
            [
                'triage_a_id' => Triage::onmiddelijk()->id,
                'triage_b_id' => Triage::nietUrgent()->id,
                'description' => 'U wordt altijd direct geholpen en hoeft niet op iemand te wachten.'
            ],
            [
                'triage_a_id' => Triage::onmiddelijk()->id,
                'triage_b_id' => Triage::standaard()->id,
                'description' => 'U wordt altijd direct geholpen en hoeft niet op iemand te wachten.'
            ],
            [
                'triage_a_id' => Triage::onmiddelijk()->id,
                'triage_b_id' => Triage::urgent()->id,
                'description' => 'U wordt altijd direct geholpen en hoeft niet op iemand te wachten.'
            ],
            [
                'triage_a_id' => Triage::onmiddelijk()->id,
                'triage_b_id' => Triage::hoogUrgent()->id,
                'description' => 'U wordt altijd direct geholpen en hoeft niet op iemand te wachten.'
            ],
            [
                'triage_a_id' => Triage::onmiddelijk()->id,
                'triage_b_id' => Triage::onmiddelijk()->id,
                'description' => 'U wordt altijd direct geholpen en hoeft niet op iemand te wachten.'
            ]
        ];

        // Loop through eacht comparison.
        foreach ($comparisons as $comparison)
        {
            // Create the comparison.
            TriageComparison::create($comparison);
        }
    }
}
