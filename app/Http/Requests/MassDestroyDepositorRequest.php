<?php

namespace App\Http\Requests;

use App\Models\Depositor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDepositorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('depositor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:depositors,id',
        ];
    }
}
