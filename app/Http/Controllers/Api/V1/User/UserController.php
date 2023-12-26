<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Contracts\User\UserInterface;
use App\Http\Controllers\Controller;
use App\userTickets;

class UserController extends Controller
{
    use userTickets;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function show(int $passportId)
    {
        if (!$this->checkUserHasTicket()) {
            return response()->json(['message' => __('text.user has not ticket')]);
        }

       return $this->userInterface->show($passportId);
    }

    /**
     * @return int
     */
    private function checkUserHasTicket(): int
    {
       return count($this->getTickets());
    }
}
