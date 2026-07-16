<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TicketMessage>
 */
class TicketMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isAgent = fake()->boolean(40); // 40% are support agents

        return [
            'ticket_id' => Ticket::factory(),
            'user_id' => function (array $attributes) use ($isAgent) {
                // If it is an agent, it could be a different support user, or the same user if it's the client.
                // We'll associate the ticket's owner or a new user depending on the case.
                if ($isAgent) {
                    return User::factory(); // Mock support agent user
                }

                return Ticket::find($attributes['ticket_id'])->user_id ?? User::factory();
            },
            'message' => fake()->paragraph(),
            'is_agent' => $isAgent,
        ];
    }
}
