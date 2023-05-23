<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SamplesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->id,
            'attributes' => [
                'title' => $this->title,
                'description' => $this->description,
            ],
            'display' => [
                'title' => 'Example',
                'description_pt' => $this->description_pt
            ],
            'relationships' => [
                'id' => (string) $this->property->id,
                'name' => $this->property->name,
            ]
        ];
    }
}
