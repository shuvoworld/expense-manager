<?php

namespace App\Http\Requests;

use App\Models\Depositor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDepositorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('depositor_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
        ];
    }
}
