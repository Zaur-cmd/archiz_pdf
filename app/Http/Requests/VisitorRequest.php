<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'              => 'required|string',
            'mrn'               => 'string',
            'reference_no'      => 'string',
            'gender'            => 'string',
            'birth_date'        => 'string',
            'location'          => 'nullable|string',
            'lab_id'            => 'nullable|integer',
            'sample_no'         => 'nullable|string',
            'passport_no'       => 'nullable|string',
            'reg_date'          => 'nullable|date',
            'collection_date'   => 'nullable',
            'reporting_date'    => 'nullable',
        ];
    }
}
