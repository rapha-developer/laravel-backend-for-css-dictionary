<?php

namespace App\Http\Resources;

use App\Utils\DateFormatWithMessage;
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
        $objDateFormat = new DateFormatWithMessage($this->created_at);
        
        return [
            'id' => (string) $this->id,
            'attributes' => [
                'title' => $this->title,
                'description' => $this->description,
                'created_at' => $objDateFormat->message
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
