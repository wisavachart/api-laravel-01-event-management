<?php
// php artisan make:resource EventResource
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //แบบ Custom
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'user' => new UserResource($this->whenLoaded('user')),
            'attendees' => AttendeeResource::collection($this->whenLoaded('attendees'))

        ];
        //แบบปกติ
        // return parent::toArray($request);
    }
}
