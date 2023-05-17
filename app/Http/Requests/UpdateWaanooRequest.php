<?php

namespace App\Http\Requests;

use App\Models\Waanoo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWaanooRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('waanoo_edit');
    }

    public function rules()
    {
        return [
            'island' => [
                'required',
            ],
            'no' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'village' => [
                'string',
                'required',
            ],
            'recipient' => [
                'string',
                'required',
            ],
            'status' => [
                'required',
            ],
            'expenditure_per_trip' => [
                'required',
            ],
            'hire_num' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'catch_weight' => [
                'string',
                'required',
            ],
            'total_catchval' => [
                'required',
            ],
            'comments' => [
                'string',
                'required',
            ],
            'remarks' => [
                'required',
            ],
        ];
    }
}
