<?php

namespace App\Http\Resources;

use App\Utils\DateFormatWithMessage;
use Carbon\Carbon;
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
        $time = Carbon::make($this->created_at)->format('h A');
        $atTime = join(' ', ['AT', $time]);
        return [
            'id' => (string) $this->id,
            'attributes' => [
                'title' => $this->title,
                'description' => $this->description,
                'created_at' => [
                    'date' => $objDateFormat->message,
                    'time' => $atTime
                ],
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
