<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Report;

class ReportCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'time' => $this->time,
            'date_received' => $this->date_received,
            'arrival_on_site' => $this->arrival_on_site,
            'name' => $this->name,
            'landmark' => $this->landmark,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'sources' => new SourceCollection($this->whenLoaded('sources'))
        ];   
    } 
}
