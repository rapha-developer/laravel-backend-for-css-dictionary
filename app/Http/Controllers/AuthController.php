<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginUserRequest $request) 
    {
        $request->validated($request->all());
        if(!Auth::attempt($request->only(['email', 'password']))) {
            $message = [
                'en' => 'Credentials do not match',
                'pt' => 'Credenciais não batem'
            ];
            return $this->error('', $message, 401);
        }
        $user = User::where('email', $request->email)->first();
        return $this->success([
            'user' => new UserResource($user),
            'token' => $user->createToken('Api Token of ' . $user->name)->plainTextToken
        ]);
    }

    public function register(StoreUpdateUserRequest $request)
    {
        $request->validated($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return $this->success([
            'user' => new UserResource($user),
            'token' => $user->createToken('Api Token of ' . $user->name)->plainTextToken
        ]);
    }

    public function logout() 
    {
        Auth::user()->currentAccessToken()->delete();
        $message = [
            'en' => 'You have successfully been logged and your token has been deleted',
            'pt' => 'Você conseguiu entrar com sucesso e seu token foi excluído'
        ];
        return $this->success([
            'message' => $message
        ]);
    }
}
