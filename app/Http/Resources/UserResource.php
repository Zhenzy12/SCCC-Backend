<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'middleName' => $this->middleName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'role' => $this->role,
            'for_911' => $this->for_911,
            'for_inventory' => $this->for_inventory,
            'for_traffic' => $this->for_traffic,
            'is_deleted' => $this->is_deleted,
            'email_verified_at' => $this->email_verified_at
        ];
    }
}
