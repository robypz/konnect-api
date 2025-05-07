<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status_id' => 'required|exists:status,id',
            'progress' => 'required|integer|min:0|max:100',
            'deadline' => 'required|date|after:start_date',
            //'deparmentment_id' => 'required|exists:departments,id',
            'category_id' => 'required|exists:categories,id',
            'start_date' => 'required|date|after:today',
            'status_id' => 'required|exists:statuses,id',
            'employees' => 'nullable|array',
            'employees.*.id' => 'exists:employees,id',
        ];
    }
}
