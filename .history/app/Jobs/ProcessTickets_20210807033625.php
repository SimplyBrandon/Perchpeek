<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;

class ProcessTickets implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ticket;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->ticket = Ticket::where('status', false)->orderBy('id')->take(1)->first();

        $this->ticket->status = true;
        $this->ticket->save();

        $this->info('[Tickets - Processing] Processed ticket at ' . \Carbon\Carbon::now());
    }
}
