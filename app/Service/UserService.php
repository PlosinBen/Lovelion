<?php

namespace App\Service;

use Laravel\Socialite\Contracts\User;
use App\Repository\Member\UserOpenIdRepository;
use App\Repository\Member\UserRepository;

class UserService
{
    private UserRepository $userRepository;
    private UserOpenIdRepository $userOpenIdRepository;


    public function __construct(UserRepository $userRepository, UserOpenIdRepository $userOpenIdRepository)
    {
        $this->userRepository = $userRepository;
        $this->userOpenIdRepository = $userOpenIdRepository;
    }

    public function getBySocialUser(string $provider, User $user)
    {
        return $this->userOpenIdRepository
            ->with('User')
            ->fetchBySocialMedia($provider, $user->getId());
    }
}
