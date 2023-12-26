<?php

namespace App;

use App\Models\Ticket;

trait userTickets
{
    public function getTickets()
    {
        return Ticket::where('user_id', auth()->id())->get();
    }
}
