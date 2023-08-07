<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetUserActivityRequest extends FormRequest
{
    public function rules()
    {
        return [
            'to
        ];
    }

    public function authorize()
    {
        return true;
    }
}
