<?php

namespace App\Contracts\Ticket;

use Illuminate\Http\JsonResponse;

interface TicketInterface
{
    public function store(array $data): JsonResponse;
}
