<?php

namespace Database\Seeders;

use App\Models\GiftCard;
use App\Models\GiftCardDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GiftCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $giftCards = [
            [
                'title' => 'Gift Card Light',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit eo ut vitae neque sed sed sit sagittis tristique scelerisque.',
                'price' => 15.00,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b793a257fad7/6325e05b19faa88edce28f77_product-gift-card-light-thumbnail-p-500.webp',
                'details' => [
                    "Congue eu consequat ac felis donec et. Feugiat vivamus at augue eget arcu dictum. Scelerisque felis imperdiet proin fermentum leo vel orci. Auctor urna nunc id cursus metus aliquam eleifend mi.",
                    "Facilisis mauris sit amet massa vitae tortor condimentum lacinia. Eget arcu dictum varius duis at consectetur lorem. Magna eget est lorem ipsum."
                ]
            ],
            [
                'title' => 'Gift Card Standard',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit eo ut vitae neque sed sed sit sagittis tristique scelerisque.',
                'price' => 15.00,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b793a257fad7/6325e0c0fed41fc9e8eba3d5_product-gift-card-standard-thumbnail-p-500.webp',
                'details' => [
                    "Congue eu consequat ac felis donec et. Feugiat vivamus at augue eget arcu dictum. Scelerisque felis imperdiet proin fermentum leo vel orci. Auctor urna nunc id cursus metus aliquam eleifend mi.",
                    "Facilisis mauris sit amet massa vitae tortor condimentum lacinia. Eget arcu dictum varius duis at consectetur lorem. Magna eget est lorem ipsum."
                ]
            ],
            [
                'title' => 'Gift Card Premium',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit eo ut vitae neque sed sed sit sagittis tristique scelerisque.',
                'price' => 15.00,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b793a257fad7/6325e07e7e7563bf1db00af2_product-gift-card-premium-thumbnail-p-500.webp',
                'details' => [
                    "Congue eu consequat ac felis donec et. Feugiat vivamus at augue eget arcu dictum. Scelerisque felis imperdiet proin fermentum leo vel orci. Auctor urna nunc id cursus metus aliquam eleifend mi.",
                    "Facilisis mauris sit amet massa vitae tortor condimentum lacinia. Eget arcu dictum varius duis at consectetur lorem. Magna eget est lorem ipsum."
                ]
            ],
            [
                'title' => 'Gift Card Gold',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit eo ut vitae neque sed sed sit sagittis tristique scelerisque.',
                'price' => 15.00,
                'image' => 'https://cdn.prod.website-files.com/6321d0d284b5b793a257fad7/6325e0913009595d2623f575_product-gift-card-gold-thumbnail-p-500.webp',
                'details' => [
                    "Congue eu consequat ac felis donec et. Feugiat vivamus at augue eget arcu dictum. Scelerisque felis imperdiet proin fermentum leo vel orci. Auctor urna nunc id cursus metus aliquam eleifend mi.",
                    "Facilisis mauris sit amet massa vitae tortor condimentum lacinia. Eget arcu dictum varius duis at consectetur lorem. Magna eget est lorem ipsum."
                ]
            ],
        ];

        // Create gift cards with details
        foreach ($giftCards as $giftCard) {
            $details = $giftCard['details'];
            unset($giftCard['details']);

            $createdCard = GiftCard::create($giftCard);

            foreach ($details as $detail) {
                GiftCardDetail::create([
                    'gift_card_id' => $createdCard->id,
                    'detail' => $detail,
                ]);
            }
        }
    }
}
