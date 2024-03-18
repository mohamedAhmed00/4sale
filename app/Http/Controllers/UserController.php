<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\Interfaces\IUserServiceInterface;

class UserController extends Controller
{
    public function __construct(readonly public IUserServiceInterface $userService)
    {
    }

    public function index(UserRequest $request)
    {
        return response()->json($this->userService->getUsers($request->validated()));
    }
}
