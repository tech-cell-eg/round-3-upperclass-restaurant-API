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
        $item = [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
            'tag' => $this->tag,
            'category' => $this->category?->name,
            'highlight' => (bool) $this->tag ? true : false
        ];

        // Check from discount
        if ($this->discount) {
            $item['originalPrice'] = $this->price;
            $item['price'] = max(0, $this->price - $this->discount->amount);
        }

        return $item;
    }
}
