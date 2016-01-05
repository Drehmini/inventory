<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonRequest extends Request
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
            'first_name'    => ['required', 'alpha_dash', 'min:3'],
            'last_name'     => ['required', 'alpha_dash', 'min:3'],
            'email'         => ['email'],
            'address'       => ['required', 'min:3'],
            'address_2'     => ['required_with' => 'address', 'min:3'],
            'city'          => ['required', 'min:3'],
            'state'         => ['required', 'min:2'],
            'zip_code'      => ['required', 'min:5', 'numeric'],
            'phone_number'  => ['required', 'phone:AUTO,US'],
        ];
    }
}
