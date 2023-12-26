<?php

namespace App\Contracts\Ticket;


use App\Contracts\Base\BaseRepository;
use App\Models\Ticket;

class TicketRepository extends BaseRepository
{
    /**
     * @return mixed
     */
    public function model(): mixed
    {
        return Ticket::class;
    }
}
