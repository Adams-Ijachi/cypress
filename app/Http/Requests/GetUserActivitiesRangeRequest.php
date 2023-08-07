<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetUserActivitiesRangeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'to' => 'required|date:d-m-Y|after:from',
            'from' => 'required|date:d-m-Y|before:to',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
