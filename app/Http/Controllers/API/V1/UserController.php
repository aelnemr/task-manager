<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserNewRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

//    public function show($id)
//    {
//        return User::query()->findOrFail($id);
//    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(UserNewRequest $request)
    {
        // $data = $request->all();
        // $request->input('phone'); // data_get($data, 'phone', 'empty');

//        $user = User::create([
//            'name' => $request->input('name'),
//            'email' => $request->input('email'),
//            'phone' => $request->input('phone'),
//            'password' => Hash::make($request->input('password'))
//        ]);

//        $data = $request->all();
//        $data['password'] = Hash::make($request->input('password'));
//        $user = User::create($request->all());

//        $request->validate([
//            'name' => 'required'
//        ]);


//        $validator = Validator::validate($request->all(), [
//            'name' => 'required'
//        ]);

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
