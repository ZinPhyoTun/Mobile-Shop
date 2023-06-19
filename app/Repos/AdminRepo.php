<?php

namespace App\Repos;

use App\Models\AdminUser;

class AdminRepo {

    /**
     * @return Object
     */
    public function model() {
        return new AdminUser();
    }
}