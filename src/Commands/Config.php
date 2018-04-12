<?php

namespace Arseniys1\Opcache\Commands;

use Illuminate\Console\Command;
use Arseniys1\Opcache\OpcacheFacade as Opcache;

class Config extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'opcache:config';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show your opcode cache configuration';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $result = Opcache::config();

        if ($result === true) {
            $this->info(json_encode($result));
        } else {
            $this->line(json_encode($result));
        }
    }
}