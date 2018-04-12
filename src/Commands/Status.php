<?php

namespace Arseniys1\Opcache\Commands;

use Illuminate\Console\Command;
use Arseniys1\Opcache\OpcacheFacade as Opcache;

class Status extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'opcache:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show state information, memory usage, etc..';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $result = Opcache::status();

        if ($result === true) {
            $this->info(json_encode($result));
        } else {
            $this->line(json_encode($result));
        }
    }
}