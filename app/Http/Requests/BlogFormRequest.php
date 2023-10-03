<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BlogFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->author_id ? Gate::check('blog-update', $this->author_id) : true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255|unique:blogs,title,' . $this->id,
            'body' => 'required',
            'date' => 'required|before_or_equal:' . now()
        ];
    }

    protected function prepareForValidation(): void {
        $this->merge([
            'title' => strip_tags($this->title),
            'body' => strip_tags($this->body)
        ]);
    }
}
