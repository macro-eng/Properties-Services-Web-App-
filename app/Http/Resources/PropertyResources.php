<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "name"=>$this->name,
            "type"=>$this->when($request->user()->role === "owner",$this->type),
            "status"=>$this->status,
            "purpose"=>$this->purpose,
            // "type"=>$this->type,
            "price"=>$this->price,
            
        ];
    }
}
