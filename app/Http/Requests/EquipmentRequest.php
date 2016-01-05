<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EquipmentRequest extends Request
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
            'serial'        => ['required', 'min:3'],
            'type'          => ['required'],
            'make'          => ['required', 'min:3'],
            'model'         => ['required', 'min:3'],
            'purchase_date' => ['required', 'date'],
        ];
    }
}
