<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $id = getRouteId($this, 'role');
        return [
            'name' => ['required', 'string', 'min:3', 'max:190', 'regex:/^[\p{Arabic}A-Za-z _-]+$/u', 'unique:roles,name,'.$id]
        ];
    }
}
