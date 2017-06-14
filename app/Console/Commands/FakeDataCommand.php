<?php

namespace IPMEDT4K\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use IPMEDT4K\Models\Patient;

class FakeDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:fake';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the database with fake data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('Do you wish to continue?') && app()->environment() == "local")
        {
            Artisan::call('migrate:refresh', [
                '--seed' => true
            ]);

            
            factory(Patient::class, 20)->create();
            factory(Patient::class, rand(20, 30))->states(['patient_checked_in'])->create();
            factory(Patient::class, rand(20, 30))->states(['patient_treated'])->create();
            factory(Patient::class, rand(20, 30))->states(['patient_checked_out'])->create();
        }
    }
}
