<?php

namespace App\Http\Controllers\Service;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserServiceController extends Controller
{
    public function storeUser(UserRequest $request, User $user)
    {
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->email = $request->email;
        // $user->image = $request->image;
        $user->password = Hash::make($request->password);
        $user->type = $request->type;
        $user->save();
    }
}
