<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserNewRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserListResource;
use App\Http\Resources\UserShowResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return UserListResource::collection(User::all());
    }

    public function show(User $user)
    {
        return new UserShowResource($user);
    }

    public function store(UserNewRequest $request)
    {
        return User::create($request->all());
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->all());
        return $user;
    }

    public function destroy(User $user)
    {
        $user->delete();
        return 'ok';
    }

}
