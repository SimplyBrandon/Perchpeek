<?php

namespace App\Console\Commands\Tickets;

use Illuminate\Console\Command;
use App\Models\Ticket;

class GenerateTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tickets:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a ticket with dummy data.';

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
     * @return int
     */
    public function handle()
    {
        $this->info('[Tickets - Generation] Generated ticket at ' . \Carbon\Carbon::now());
        Ticket::factory()->create();
    }
}
