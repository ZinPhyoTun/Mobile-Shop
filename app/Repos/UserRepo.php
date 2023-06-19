<?php

namespace App\Repos;

use App\Models\User;

class UserRepo {

    /**
     * @return Object
     */
    public function model()
    {
        return new User();
    }
}