<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $price = $this->price;
        $discountAmount = $this->discount?->amount ?? 0;
        $finalPrice = max(0, $price - $discountAmount);
    
        $item = [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => round($finalPrice, 3),
            'image' => $this->image,
            'tag' => $this->tag,
            'category' => $this->category?->name,
            'highlight' => (bool) $this->tag,
        ];
    
        if ($this->discount) {
            $item['originalPrice'] = round($price, 3);
        }
    
        return $item;
    }
    
}
