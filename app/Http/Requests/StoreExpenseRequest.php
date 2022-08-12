<?php

namespace App\Http\Requests;

use App\Models\Expense;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExpenseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('expense_create');
    }

    public function rules()
    {
        return [
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'category_id' => [
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
            'description' => [
                'string',
                'min:2',
                'max:255',
                'required',
            ],
        ];
    }
}
