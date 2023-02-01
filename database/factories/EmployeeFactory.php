<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'user_id' => 1,
            // 'name'=>
            'mno' => $this->faker->numerify('##########'),
            'dob' => $this->faker->date('Y-m-d'),
            'gender' => $this->faker->randomElement(['male','female','other']),
            'add1' => $this->faker->sentence(14),
            'add2' => $this->faker->sentence(10),
            'dept' => $this->faker->randomElement(['BDE','Management','Sales','OA','Developer']),
            'designation' => $this->faker->jobTitle(),
            'doj' => $this->faker->date('Y-m-d'),
            'type' => $this->faker->randomElement(['intern/trainee','full time','part time']),
        ];
    }
}
