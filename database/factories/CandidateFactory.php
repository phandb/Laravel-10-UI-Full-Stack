<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'canFirstName' => fake()->firstName(),
            'canMiddleName' => fake()->firstName(),
            'canLastName' => fake()->lastName(),
            'canSaintName' => fake()->lastName(),
            'dateOfBirth' => fake()->dateTimeBetween('2008-09-01', '2010-12-31')
            ->format('Y/m/d'),
            'address' => fake()->address(),
           
            'email' => fake()->safeEmail(),
            'is_baptized_at_HVMCC' => rand(0 ,1),
            'baptizedYear' => fake()->year(),
            'baptismForm' => fake()->url(),
            'dadFirstName' => fake()->firstName(),
            'dadLastName' => fake()->lastName(),
            'dadPhone' => fake()->phoneNumber(),
            'momFirstName' => fake()->firstName(),
            'momLastName' => fake()->lastName(),
            'momPhone' => fake()->phoneNumber(),
            'sponFirstName' => fake()->firstName(),
            'sponLastName' => fake()->lastName(),
        ];

    }
}
