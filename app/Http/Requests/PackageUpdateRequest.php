<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageUpdateRequest extends FormRequest
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
            'name' => 'required|string|unique:packages,name,'.$this->route('package')?->id,
            'overview' => 'required',
            'include' => 'sometimes',
            'exclude' => 'sometimes',
            'useful_info' => 'sometimes',
            'image' => 'sometimes|mimes:png,jpg,jpeg,webp',
            'trip_map' => 'sometimes|mimes:png,jpg,jpeg,webp',
            'location' => 'required|string:max:255',
            'duration' => 'required|integer',
        ];
    }
}
