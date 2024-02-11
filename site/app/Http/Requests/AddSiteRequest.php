<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class AddSiteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:sites|max:255|min:3',
            'url' => 'required|unique:sites|max:255|url:https',
            'http_notification' => 'required|unique:sites|max:255|url:https',
            'http_ref' => 'required|unique:sites|max:255|url:https',
        ];
    }
}
