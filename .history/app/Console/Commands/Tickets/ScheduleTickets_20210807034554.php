<?php

namespace App\Console\Commands\Tickets;

use Illuminate\Console\Command;
use App\Models\Config;
use App\Models\Ticket;

class ScheduleTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tickets:schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Toggles the scheduling of the tickets generation & processing commands.';

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
     * @return void
     */
    public function handle()
    {
        Ticket::truncate();
        
        Config::toggleDummyTicketTest();

        $this->call('schedule:list');
        $this->call('schedule:work');
    }
}
