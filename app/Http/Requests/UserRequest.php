<?php

namespace Corp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->canDo('EDIT_USERS');
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();


        /*
         *   Validator performs check, only of function returns true
         *   So, in our case we have to perform check in two cases:
         *   1) The password field is not empty. It does not matter whether we are on 'create' page or 'update' page
         *   2) The password field is empty, but we are not on the 'create' page
         */
        $validator->sometimes('password','required|min:6|confirmed', function($input) {
            if(!empty($input->password) || (empty($input->password) &&  $this->route()->getName() !== 'admin.users.update')){
                 return TRUE;
            }

            return FALSE;
        });

        // second way to validate the uniqueness of email address
//        $validator->sometimes('email','unique:users|max:255', function($input) {
//
//            if($this->route()->hasParameter('user')) {
//                $model = $this->route()->parameter('user');
//                return ($model->email !== $input->email)  && !empty($input->email);
//            }
//
//            return !empty($input->email);
//        });

        return $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = isset($this->route()->parameter('users')->id) ? $this->route()->parameter('users')->id : '';
        return [
            'name' => 'required|max:255',
            'login' => 'required|max:255',
            'role_id' => 'required|integer',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
        ];
    }
}
