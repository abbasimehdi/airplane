<?php

namespace App\Services;

use App\Contracts\User\UserInterface;
use App\Contracts\User\UserRepository;

class UserService implements UserInterface

{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show(int $passportIS): \Illuminate\Http\JsonResponse
    {
        return $this->userRepository->show($passportIS);
    }
}
