<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GiftCard>
 */
class GiftCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement(['Gift Card Light', 'Gift Card Standard', 'Gift Card Premium', 'Gift Card Gold']),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomElement([15, 30, 50, 100]),
            'image' => $this->faker->imageUrl(640, 480, 'gift card', true),
        ];
    }
}
