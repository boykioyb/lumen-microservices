<?php
namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user' => [
                'name' => $this->name,
                'email' => $this->email,
                'created_at' => format_datetime($this->created_at),
                'last_logged_in' => $this->last_logged_in ? format_datetime($this->last_logged_in) : null,
            ],
            'access_token' => [
                'token' => $this->token,
                'token_type' => 'bearer',
                'expires_at' => format_datetime($this->expires_at),
            ],
        ];
    }
}
