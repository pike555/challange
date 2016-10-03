<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddannounceRequest extends FormRequest
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
            'inputTitle'=>'required',
            'inputContent'=>'required',
            'inputImg'=>'required',
        ];
    }
}
