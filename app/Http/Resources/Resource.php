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
        try {
			$pagination = [
				'total' => $this->total() ?? 0,
				'count' => $this->count() ?? 0,
				'per_page' => $this->perPage() ?? 0,
				'current_page' => $this->currentPage() ?? 0,
				'total_pages' => $this->lastPage() ?? 0
			];
		} catch (Exception $e) {
			throw $e;
		}
		return $pagination;
    }
}
