<?php

namespace App\Contracts\User;

use App\Contracts\Base\BaseRepository;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UserRepository extends BaseRepository
{
    /**
     * @return mixed
     */
    public function model(): mixed
    {
        return User::class;
    }

    /**
     * @param int $passportId
     * @return JsonResponse
     */
    public function show(int $passportId): JsonResponse
    {
        // Sort array by Bubble sort algorithm
        $userTickets = User::findUser()->first()->tickets;
        for ($i = count($userTickets) - 1; $i >= 0; $i--) {
            for ($j = 0; $j < $i; $j++) {
                if (strtoupper($userTickets[$i]->destination) == strtoupper($userTickets[$j]->origin)) {
                    $temp = $userTickets[$i];
                    $userTickets[$i] = $userTickets[$j];
                    $userTickets[$j] = $temp;
                }
            }
        }

        return response()->json([$userTickets->first()->origin, $userTickets->last()->destination], 200);
    }
}
