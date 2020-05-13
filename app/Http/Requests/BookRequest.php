<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'book_image'=>'required|image|mimes:jpeg,png,jpg',
            'book_id'=>'required|unique:books,id',
            'book_name'=>'required',
            'book_author'=>'required',
            'book_publisher'=>'required',
            'book_year'=>'required|date|before:today',
            'book_price'=>'required',
            'book_date_added'=>'required|date|before:tomorrow',
        ];
    }
    public function messages()
    {
        return [
            'required'=>'This field is required.',
            'date'=>'Invalid date format.',
            'before'=>'Date must be a date before today.',
            'image'=>'Book cover must be a jpeg, jpg or png.',
        ];
    }
}
