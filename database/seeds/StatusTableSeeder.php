<?php

use Illuminate\Database\Seeder;
use IPMEDT4K\Models\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'Ingecheckt',
                'slug' => str_slug('Ingecheckt')
            ],
            [
                'name' => 'Wachten',
                'slug' => str_slug('Wachten')
            ],
            [
                'name' => 'In behandeling',
                'slug' => str_slug('In behandeling')
            ],
            [
                'name' => 'Uitgecheckt',
                'slug' => str_slug('Uitgecheckt')
            ]
        ];

        foreach($statuses as $status)
        {
            Status::create($status);
        }
    }
}
