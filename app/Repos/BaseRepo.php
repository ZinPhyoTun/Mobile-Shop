<?php

namespace App\Repos;

class BaseRepo {
    
    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->model()->query();
    }
}