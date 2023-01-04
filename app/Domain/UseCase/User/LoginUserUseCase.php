<?php

namespace App\Domain\UseCase\User;

use App\Domain\Exception\LoginFailedException;
use Illuminate\Support\Facades\Auth;

class LoginUserUseCase
{
    /**
     * @throws LoginFailedException
     */
    public function process(string $email, string $password) : void {
        $result =  Auth::attempt(
            [
                'email' => $email,
                'password' => $password
            ]
        );

        if(false === $result) {
            throw new LoginFailedException();
        }
    }
}
