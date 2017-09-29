<?php

namespace App\Models;

use Illuminate\Http\Resources\Json\Resource;

class TodoResource extends Resource {

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'completed' => $this->completed
        ];
    }


}