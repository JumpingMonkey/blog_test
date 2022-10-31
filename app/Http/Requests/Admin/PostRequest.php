<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $categoryIds = Category::all('id')->pluck('id')->toArray();

        return [
            'title' => 'required|string|min:5',
            'content' => 'required|string',
            'published_date' => 'date',
            'status' => [Rule::in([1, 0])],
            'category_id' => ['integer', 'required', Rule::in($categoryIds)],
        ];

    }
}
