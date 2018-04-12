<?php

namespace Arseniys1\Opcache\Commands;

use Illuminate\Console\Command;
use Arseniys1\Opcache\OpcacheFacade as Opcache;

class Optimize extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'opcache:optimize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pre-compile your application code';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $result = Opcache::optimize();

        if ($result === true) {
            $this->info(json_encode($result));
        } else {
            $this->line(json_encode($result));
        }
    }
}