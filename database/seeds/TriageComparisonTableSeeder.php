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
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::nietUrgent()->id,
                'triage_b_id' => Triage::standaard()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::nietUrgent()->id,
                'triage_b_id' => Triage::urgent()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::nietUrgent()->id,
                'triage_b_id' => Triage::hoogUrgent()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::nietUrgent()->id,
                'triage_b_id' => Triage::onmiddelijk()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::standaard()->id,
                'triage_b_id' => Triage::nietUrgent()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::standaard()->id,
                'triage_b_id' => Triage::standaard()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::standaard()->id,
                'triage_b_id' => Triage::urgent()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::standaard()->id,
                'triage_b_id' => Triage::hoogUrgent()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::standaard()->id,
                'triage_b_id' => Triage::onmiddelijk()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::urgent()->id,
                'triage_b_id' => Triage::nietUrgent()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::urgent()->id,
                'triage_b_id' => Triage::standaard()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::urgent()->id,
                'triage_b_id' => Triage::urgent()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::urgent()->id,
                'triage_b_id' => Triage::hoogUrgent()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::urgent()->id,
                'triage_b_id' => Triage::onmiddelijk()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::hoogUrgent()->id,
                'triage_b_id' => Triage::nietUrgent()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::hoogUrgent()->id,
                'triage_b_id' => Triage::standaard()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::hoogUrgent()->id,
                'triage_b_id' => Triage::urgent()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::hoogUrgent()->id,
                'triage_b_id' => Triage::hoogUrgent()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::hoogUrgent()->id,
                'triage_b_id' => Triage::onmiddelijk()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::onmiddelijk()->id,
                'triage_b_id' => Triage::nietUrgent()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::onmiddelijk()->id,
                'triage_b_id' => Triage::standaard()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::onmiddelijk()->id,
                'triage_b_id' => Triage::urgent()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::onmiddelijk()->id,
                'triage_b_id' => Triage::hoogUrgent()->id,
                'description' => ''
            ],
            [
                'triage_a_id' => Triage::onmiddelijk()->id,
                'triage_b_id' => Triage::onmiddelijk()->id,
                'description' => ''
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
