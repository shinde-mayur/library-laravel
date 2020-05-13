<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IssueDepositRequest extends FormRequest
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
            'user_id'=>'required',
            'book_id'=>'required',
        ];
    }
    public function messages()
{
    return [
        'user_id.required' => 'User ID is required',
        'book_id.required'  => 'Book ID is required',
        'book_action.accepted'  => 'Select your action is required',
    ];
}
}
