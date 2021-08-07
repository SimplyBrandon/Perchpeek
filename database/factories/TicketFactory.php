<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->sentence(5),
            'content' => $this->faker->sentence(16),
            'creator_name' => $this->faker->name,
            'creator_email' => $this->faker->unique()->safeEmail,
            'created_at' => now(),
            'updated_at' => now(),
            'status' => false
        ];
    }
}
