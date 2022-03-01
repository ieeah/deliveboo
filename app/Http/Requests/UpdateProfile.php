<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateProfile extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            // 'thumb' => 'image|mimes:jpg,png|max:2000',
            // 'address' => 'max:255|min:5|nullable',
            // 'password' => 'string|min:8|max:255',
            // 'old_password' => 'string|min:8|max:255|password',

            'name' => 'required|string|max:255',
            'password' => 'nullable|required_with:password_confirmation|string|confirmed',
            'current_password' => 'required',
        ];
    }

    public function withValidator($validator)
    {
        // checks user current password
        // before making changes
        $validator->after(function ($validator) {
            if (!Hash::check($this->current_password, $this->user()->password)) {
                $validator->errors()->add('current_password', 'Your current password is incorrect.');
            }
        });
        return;
    }
}
