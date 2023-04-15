<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Service\UserServiceController;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(6);
        return UserResource::collection($users);
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $userService = new UserServiceController();
        $userService->storeUser($request, $user);
        $response = new UserResource($user);

        return response()->json([
            'success' => true,
            'data' => $response
        ]);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UserRequest $request, User $user)
    {
        $userService = new UserServiceController();
        $userService->storeUser($request, $user);
        $response = new UserResource($user);

        return response()->json([
            'success' => true,
            'data' => $response
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'msg' => 'User deleted'
        ]);
    }
}
