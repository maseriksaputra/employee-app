<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        $departments = ['IT', 'HR', 'Finance', 'Marketing', 'Operations'];
        $positions = ['Staff', 'Supervisor', 'Manager', 'Director'];

        return [
            'name' => fake()->name(),
            'department' => fake()->randomElement($departments),
            'position' => fake()->randomElement($positions),
            'join_date' => fake()->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'document_path' => null,
        ];
    }
}