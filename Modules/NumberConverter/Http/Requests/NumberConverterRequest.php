<?php

namespace Modules\NumberConverter\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NumberConverterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'number'        => 'required|numeric',
            'decimalPlaces' => 'nullable|integer|min:0',
            'language'      => 'nullable|in:en,fa',
        ];
    }

    protected function prepareForValidation()
    {
        $number = $this->input('number');

        if (!is_numeric($number)) {
            $this->replace([
                'number' => null,
            ]);
        } else {
            $this->merge([
                'number' => floatval($number),
            ]);
        }
    }

    public function authorize()
    {
        return true;
    }
}
