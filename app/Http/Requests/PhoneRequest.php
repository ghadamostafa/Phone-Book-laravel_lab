<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PhoneRequest extends FormRequest
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
            'phone' => ['required','digits:11','numeric','regex:/(^(010|011|012)([1-9]){8}$)/',
            Rule::unique('phones')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })
            ]
        ];
    }
}
