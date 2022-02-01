<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class userResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user_name'=>isset($this->name) ? $this->name:' notfound ',
            'user_email'=>isset($this->email) ? $this->email:' notfound ',
            'user_id'=>isset($this->id) ? $this->id:' notfound '

        ];
    }
}
