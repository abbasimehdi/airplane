<?php

namespace App\Http\Requests\ticket;

use App\Http\Middleware\CheckPassportIdExist;
use App\Rules\CheckStringIsValid;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            "origin"          => ["required", "min:3", "max:32", new CheckStringIsValid()],
            "destination"     => ["required", "min:3", "max:32", new CheckStringIsValid()],
            "start_date"      => "required|date",
            "end_date"        => "required|date",
        ];
    }
}
