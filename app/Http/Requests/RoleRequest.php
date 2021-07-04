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
        $id = '';
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')){
            $id = $this->route('role')->id;
        }
        return [
            'name' => ['required', 'string', 'min:3', 'max:190', 'regex:/[A-Za-z]+/', 'unique:roles,name,'.$id]
        ];
    }
}
