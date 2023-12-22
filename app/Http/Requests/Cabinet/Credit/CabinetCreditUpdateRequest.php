<?php

namespace App\Http\Requests\Cabinet\Credit;

use Illuminate\Foundation\Http\FormRequest;

class CabinetCreditUpdateRequest extends FormRequest {

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'title'        => 'string|nullable',
            'creditor'     => 'string|nullable',
            'start_date'   => 'nullable|date',
            'payment_date' => 'nullable|integer',
            'amount'       => [
                'regex:/^\d+(\.\d{1,2})?$/',
                'nullable'
            ],
            'percent'      => [
                'regex:/^\d+(\.\d{1,2})?$/',
                'nullable'
            ],
            'period'       => 'integer|nullable',
            'payment'      => [
                'regex:/^\d+(\.\d{1,2})?$/',
                'nullable'
            ],
            'status' => 'nullable|integer',
        ];
    }
}
