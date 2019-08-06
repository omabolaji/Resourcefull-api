<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
// use App\Http\Resources\BookResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'user' => $this->user,
            'ratings' => $this->ratings,
            'average_rating' => $this->ratings->avg('rating')
        ];
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0.1',
            'author_url' => url('http://www.famouseb.com'),
        ];
    }
}
