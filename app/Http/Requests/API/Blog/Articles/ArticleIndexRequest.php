<?php

declare(strict_types=1);

namespace App\Http\Requests\API\Blog\Articles;

use App\Rules\InArrayRule;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class ArticleIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[Pure]
    #[ArrayShape([
        'category_id' => "string",
        'sort_by' => "array",
        'sort_direction' => "array",
        'per_page' => "string"
    ])]
    public function rules(): array
    {
        return [
            'category_id' => 'numeric|exists:categories,id|nullable',
            'sort_by' => ['string', 'nullable', new InArrayRule(['created_at', 'views_count'])],
            'sort_direction' => ['string', 'nullable', new InArrayRule(['asc', 'desc'])],
            'per_page' => 'numeric|min:1|max:25|nullable'
        ];
    }

    #[ArrayShape(['exists' => "string"])]
    public function messages(): array
    {
        return [
            'exists' => 'Category not found'
        ];
    }
}
