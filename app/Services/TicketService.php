<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use App\Contracts\Ticket\TicketInterface;
use App\Contracts\Ticket\TicketRepository;
use Illuminate\Support\Facades\Auth;

class TicketService implements TicketInterface

{
    /**
     * @param TicketRepository $productRepository
     */
    public function __construct(protected TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * @param array $data
     * @return JsonResponse
     */
    public function store(array $data): JsonResponse
    {
        $data['user_id'] = Auth::user()->id;

        return $this->ticketRepository->create($data);
    }
}
