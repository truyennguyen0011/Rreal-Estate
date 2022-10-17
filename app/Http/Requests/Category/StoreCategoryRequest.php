<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
                'filled',
                'min:1',
                'max:255',
                'unique:categories,title',
            ],
            'slug' => [
                'required',
                'string',
                'filled',
                'min:1',
                'max:255',
                'unique:categories,slug',
            ],
            'active' => [
                'nullable',
                'boolean',
            ],
        ];
    }
    
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống !',
            'title.string' => 'Tiêu đề phải là chữ !',
            'title.filled' => 'Tiêu đề không hợp lệ !',
            'title.min' => 'Tiêu đề quá ngắn !',
            'title.max' => 'Tiêu đề quá dài !',
            'title.unique' => 'Tiêu đề đã tồn tại !',
            'slug.required' => 'Slug không được để trống !',
            'slug.string' => 'Slug phải là chữ !',
            'slug.filled' => 'Slug không hợp lệ !',
            'slug.min' => 'Slug quá ngắn !',
            'slug.max' => 'Slug quá dài !',
            'slug.unique' => 'Slug đã tồn tại !',
            'active.boolean' => 'Trạng thái chỉ có thể là true hoặc false !',
        ];
    }
}
