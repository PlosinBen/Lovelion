<?php

namespace App\Repository\Member;

use App\Models\Member\User;
use App\Repository\Repository;

class UserRepository extends Repository
{
    public function __construct(User $user)
    {
        $this->Model = $user;
    }
}
