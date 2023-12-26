<?php

namespace App\Http\Controllers\Api\V1\Ticket;

use App\Contracts\Ticket\TicketInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ticket\StoreRequest;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{


    public function __construct(TicketInterface $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): JsonResponse
    {
        return $this->ticket->store($request->post());
    }
}
