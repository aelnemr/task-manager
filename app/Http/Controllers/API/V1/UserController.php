<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserNewRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserListResource;
use App\Http\Resources\UserShowResource;
use App\Models\User;

class UserController extends Controller
{
    use CoreJsonResponse;

    public function index()
    {
//        return UserListResource::collection(User::all());
        return $this->ok(UserListResource::collection(User::all())->resolve());
    }

    public function show(User $user)
    {
//        return new UserShowResource($user);
        return $this->ok((new UserShowResource($user))->resolve());
    }

    public function store(UserNewRequest $request)
    {
//        return new UserShowResource(User::create($request->all()));
        return $this->created((new UserShowResource(User::create($request->all())))->resolve());
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->all());
//        return new UserShowResource($user);
        return $this->accepted((new UserShowResource($user))->resolve());
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $this->accepted();
    }

}
