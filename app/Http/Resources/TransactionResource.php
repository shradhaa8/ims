<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return[
            'id' => $this->id,
            'description' => $this->description,
            'status' => $this->status,
            'qty' => $this->qty,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'product_name' => $this->product_name
        ];
    }
}
