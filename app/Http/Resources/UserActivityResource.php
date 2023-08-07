<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\UserActivity */
class UserActivityResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'is_global' => $this->is_global,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
