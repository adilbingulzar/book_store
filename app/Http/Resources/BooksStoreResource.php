<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BooksStoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            =>  $this->id,
            'author'        =>  $this->author,
            'book_name'     =>  $this->book_name,
            'publish_year'  =>  $this->publish_year,
            'best_seller'   =>  $this->best_seller,
        ];
    }
}
