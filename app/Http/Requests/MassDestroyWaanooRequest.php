<?php

namespace App\Http\Requests;

use App\Models\Waanoo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyWaanooRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('waanoo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:waanoos,id',
        ];
    }
}
