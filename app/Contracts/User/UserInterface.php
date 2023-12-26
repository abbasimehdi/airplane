<?php

namespace App\Contracts\User;

use Illuminate\Http\JsonResponse;

interface UserInterface
{
    public function show(int $passportIS): JsonResponse;
}
