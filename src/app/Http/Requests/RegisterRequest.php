<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'email' => 'unique:App\Models\User,email|required|email|string|max:191',
            'password' => 'required|confirmed|min:8|max:191',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => '名前を入力してください',
            'name.string' => '名前を文字列で入力してください',
            'name.max' => '名前を191文字以下で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'email.max' => 'メールアドレスを191文字以下で入力してください',
            'email.unique' => '入力されたメールアドレスは使用済みです',
            'password.required' => 'パスワードを入力してください',
            'password.confirmed' => '入力されたパスワードが一致しません',
            'password_min' => 'パスワードを8文字以上で入力してください',
            'password_max' => 'パスワードを191文字以下で入力してください',
        ];
    }
}
