<?php

namespace App\Http\Requests;

use App\Models\Deposit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDepositRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('deposit_create');
    }

    public function rules()
    {
        return [
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'depositor_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'required',
            ],
            'account_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
