<?php

namespace App\Http\Requests;

use App\Models\Account;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAccountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('account_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:2',
                'max:50',
                'required',
                'unique:accounts',
            ],
            'opening_balance' => [
                'required',
            ],
        ];
    }
}
