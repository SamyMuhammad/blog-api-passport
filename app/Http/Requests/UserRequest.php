<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = getRouteId($this, 'user');
        return [
            'name' => ['required', 'string', 'min:3', 'max:190', 'regex:/^[\p{Arabic}A-Za-z _-]+$/u'],
            'email' => ['required', 'email', 'min:3', 'max:190', 'unique:users,email,'.$id],
            'password' => ['required', 'string', 'min:3', 'max:190', 'confirmed'],
            'role_id' => ['nullable', 'exists:roles,id']
        ];
    }

    /**
     * Handle a passed validation attempt.
     *
     * @return void
     */
    protected function passedValidation()
    {
        $this->merge([
            'password' => bcrypt($this->password)
        ]);
    }

    /**
     * Get the validated data from the request.
     *
     * @return array
     */
    public function validated()
    {
        return array_merge($this->validator->validated(), ['password' => $this->password]);
    }
}
