<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CalculateArraySum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate {array*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate the sum of an array elements and it\'s child array elements.';

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
        $array = $this->argument('array');
        $sum = 0;

        foreach ($array as $value) {
            $sum += (int) preg_replace('/[^0-9]/', '', $value);
        }

        $this->info($sum);
    }
}
