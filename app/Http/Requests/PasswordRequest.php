<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'name' => 'required|min:3',
            'cpassword' => 'min:5|different:password'
        ];
    }

    public function messages(){
        return [
            'name.required'=> "name can't left empty....",
            'name.min'=> "name must be at least 3 characther....",
            'cpassword.min'=> "Password must be at least 5 characther....",
            'cpassword.required'=> "Password must be at least 5 characther....",
          
        ];
    }
}
