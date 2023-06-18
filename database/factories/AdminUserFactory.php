<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
        ];
    }
}
