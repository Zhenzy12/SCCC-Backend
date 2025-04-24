<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'source_id' => 'required',
            'incident_id' => 'required',
            'assistance_id' => 'required',
            'time' => 'required',
            'date_received' => 'required',
            'arrival_on_site' => 'required',
            'name' => 'required',
            'landmark' => 'required|string',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'barangay_id' => 'required',
            'actions_id' => 'required',
            'description' => 'nullable|string',
            'urgency_id' => 'required',
        ];
    }
}
