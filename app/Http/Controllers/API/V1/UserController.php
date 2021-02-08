<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Middleware\IsAuth;
use App\Http\Requests\UserNewRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserListResource;
use App\Http\Resources\UserShowResource;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    use CoreJsonResponse;

    private function auth(Request $request)
    {
        $token = $request->header('Authorization');
        abort_if(!$token, 401);

        $user = User::query()->where('token', $token)->first();
        abort_if(!$user, 401);
    }

    public function index(Request $request)
    {
        $users = User::query()->paginate($request->query('limit', 10));
        $users = UserListResource::collection($users);

        return $this->okWithPagination($users);
    }

    public function show(Request $request, User $user)
    {
        return $this->ok((new UserShowResource($user))->resolve());
    }

    public function store(UserNewRequest $request)
    {
        return $this->created((new UserShowResource(User::create($request->all())))->resolve());
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->all());
        return $this->accepted((new UserShowResource($user))->resolve());
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return $this->accepted();
    }

    public function login(Request $request)
    {
        $username = $request->input('email');
        $password = $request->input('password');

        $user = User::query()->where('email', $username)->first();
        if (!$user) {
            return $this->invalidRequest(['username' => 'invalid username or password']);
        }


        $password = Hash::check($password, $user->password);

        if (!$password) {
            return $this->invalidRequest(['username' => 'invalid username or password']);
        }

        $token = Str::random(32);
        $user->token = $token;
        $user->save();

        $data = [
            'token' => $token,
            'user' => new UserShowResource($user)
        ];

        return $this->ok($data);
    }

}
