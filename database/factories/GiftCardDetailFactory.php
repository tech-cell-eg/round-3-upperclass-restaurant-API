<?php

namespace Database\Factories;

use App\Models\GiftCard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GiftCardDetail>
 */
class GiftCardDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gift_card_id' => GiftCard::inRandomOrder()->first()?->id ?? 1,
            'detail' => $this->faker->sentence(10),
        ];
    }
}
