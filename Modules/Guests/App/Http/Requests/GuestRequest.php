<?php

namespace Modules\Guests\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
        'name'=> 'required',
        'phone' => ['required', 'regex:/^(0|(\+\d{1,2}\s?))?((01)([-.\s]?)\d{3}([-.\s]?)\d{4})$/'],

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
