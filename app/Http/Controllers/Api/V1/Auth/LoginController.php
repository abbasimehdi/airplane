<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Resources\BaseListCollection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->isAttempt($request->post());

        return (new BaseListCollection(collect(
            [
                'token'  =>  auth()->user()->createToken('API Token')->accessToken
            ]
        )))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }

    /**
     * @param array $data
     * @return Application|ResponseFactory|\Illuminate\Foundation\Application|Response|void
     */
    private function isAttempt(array $data)
    {
        if (!auth()->attempt($data)) {
            return response(['error_message' => 'Incorrect Details.Please try again']);
        }
    }
}
