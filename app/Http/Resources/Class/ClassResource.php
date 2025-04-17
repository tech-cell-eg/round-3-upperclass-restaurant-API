<?php

namespace App\Http\Resources\Class;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ClassResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'image' => $this->image ? url(Storage::url('classes/' . $this->image)) : null,
            'description' => $this->description,
            'price' => $this->price,
            'date' => $this->date,
            'teacher' => $this->whenLoaded('teacher', function () {
                return [
                    'name' => $this->teacher->name,
                    'image' => $this->teacher->image ? url(Storage::url('teachers/' . $this->teacher->image)) : null,
                    'description' => $this->teacher->description,
                ];
            }),
        ];
    }
}
