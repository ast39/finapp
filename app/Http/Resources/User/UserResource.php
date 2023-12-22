<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {

    public static $wrap = 'data';


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'user_id' => $this->id ?? null,
            'login' => $this->login ?? null,
            'name' => $this->name ?? null,
            'email' => $this->email ?? null,
            'created' => $this->created_at ?? null,
            'updated' => $this->updated_at ?? null,
        ];
    }
}
