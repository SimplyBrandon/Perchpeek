<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;

class TicketAPIController extends Controller
{

    public function __construct()
    {
        if(Ticket::count() == 0){
            dd("eh");
        }
    }

    /**
     * Return the open tickets
     * 
     * @return json
     */
    public function getOpenTickets()
    {
        $tickets = Ticket::where('status', '=', '0')->paginate(10);

        return json_encode($tickets);
    }

    /**
     * Return the closed tickets
     * 
     * @return json
     */
    public function getClosedTickets()
    {
        $tickets = Ticket::where('status', '=', '1')->paginate(10);

        return json_encode($tickets);
    }

    /**
     * Return the tickets from a user by email
     * 
     * @return json
     */
    public function getTicketsFromUserByEmail($email)
    {
        $tickets = Ticket::where('creator_email', '=', $email)->paginate(10);

        return json_encode($tickets);
    }

    /**
     * Return statistics regarding tickets
     * 
     * @return json
     */
    public function getTicketStatistics()
    {
        $statistics = [
            'tickets' => Ticket::count(),
            'unprocessed_tickets' => Ticket::where('status', '=', '0')->count(),
            'most_frequent_creator' => DB::table('tickets')->selectRaw('creator_email, creator_name, COUNT(*) as tickets')->groupBy('creator_email')->orderBy('tickets', 'desc')->first(),
            'last_processing_time' => Ticket::where('status', '=', '1')->orderBy('id', 'desc')->first()->updated_at->diffForHumans()
        ];

        return json_encode($statistics);
    }
}
