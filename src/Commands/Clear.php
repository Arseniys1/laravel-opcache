<?php

namespace Arseniys1\Opcache\Commands;

use Illuminate\Console\Command;
use Arseniys1\Opcache\OpcacheFacade as Opcache;

class Clear extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'opcache:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear the opcode cache';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $result = Opcache::clear();

        if ($result === true) {
            $this->info('Opcode cache cleared ' . json_encode($result));
        } else {
            $this->line('Opcode cache: Nothing to clear ' . json_encode($result));
        }
    }
}