<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use JetBrains\PhpStorm\ArrayShape;

class Resource extends ResourceCollection
{
    #[ArrayShape([
        'total' => "mixed",
        'count' => "int",
        'per_page' => "mixed",
        'current_page' => "mixed",
        'total_pages' => "mixed"
    ])]
    public function pagination() {
        return [
            'total' => $this->total(),
            'count' => $this->count(),
            'per_page' => $this->perPage(),
            'current_page' => $this->currentPage(),
            'total_pages' => $this->lastPage()
        ];
    }
}
