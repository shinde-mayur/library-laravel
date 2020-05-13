<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Student;
class StudentRequest extends FormRequest
{
    // $student=new Student;
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
            'stud_id'=>'required|alpha_num|unique:students,id',
            'stud_name'=>'required|string',
            'stud_gender'=>'required',
            'stud_class'=>'required',
            'stud_contact'=>'required|digits:10|unique:students,id',
            'stud_email'=>'required|email|unique:students,id',
            'stud_addr'=>'required',
            'stud_city'=>'required',
            'stud_pin'=>'required|numeric|digits:6',
        ];
    }
    public function messages()
    {
        return[
            'required'=>'This field is required.',
            'stud_name.string'=>'Name cannot contain numbers.',
            'stud_contact.digits'=>'Contact must be of 10 digits only.',
            'stud_email.email'=>'Invalid Email adddress.',
            'stud_pin.numeric'=>'Invalid Pincode',
            'stud_pin.digits'=>'Pincode must be of 6 digits only.',
            'stud_id.unique'=>'This Student ID has already been taken.',
            'stud_email.unique'=>'This Email has already been taken.',
            'stud_contact.unique'=>'This Contact has already been taken.',
        ];
    }
}
