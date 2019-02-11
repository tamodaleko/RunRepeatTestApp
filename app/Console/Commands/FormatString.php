<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FormatString extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'format {string} {arguments*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Format string based on arguments supplied.';

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
        $string = $this->argument('string');
        $arguments = $this->argument('arguments');

        preg_match_all('/{(.*?)}/', $string, $matches);

        if (!$matches || !isset($matches[1])) {
            return $this->info($string);
        }

        foreach ($matches[1] as $match) {
            if (isset($arguments[$match])) {
                $string = str_replace('{' . $match . '}', $arguments[$match], $string);
            }
        }

        $this->info($string);
    }
}
