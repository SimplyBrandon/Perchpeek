<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketAPIController extends Controller
{
    /**
     * Return the open tickets in json format
     * 
     * @return json
     */
    public function getOpenTickets()
    {
        $tickets = Ticket::where('status', '0')->paginate(10);

        return json_encode($tickets);
    }

    /**
     * Return the closed tickets in json format
     * 
     * @return json
     */
    public function getClosedTickets()
    {
        $tickets = Ticket::where('status', '1')->paginate(10);

        return json_encode($tickets);
    }

    /**
     * Return the tickets from a user
     * 
     * @return json
     */
    public function getTicketsFromUser($email)
    {
        $tickets = Ticket::where('creator_email', '=', $email)->paginate(10);

        return json_encode($tickets);
    }
}
