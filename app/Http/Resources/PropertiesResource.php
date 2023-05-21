<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertiesResource extends JsonResource
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
                'name' => $this->name,
                'description' => $this->description,
                'category' => $this->category,
                'created_at' => Carbon::make($this->created_at)->format('Y-m-d'),
                'updated_at' => Carbon::make($this->updated_at)->format('Y-m-d'),
            ],
            'slug' => [
                'category' => str_replace(' ', '-', $this->category),
                'name' => str_replace(' ', '-', $this->name)
            ],
            'relationships' => [
                'id' => (string) $this->user->id,
                'user name' => $this->user->name,
                'user email' => $this->user->email
            ]
        ];
    }
}
