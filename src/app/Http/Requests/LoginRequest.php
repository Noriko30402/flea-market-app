<?php

namespace App\Http\Requests;

use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FortifyLoginRequest
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
            'name' => 'required|string',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
           'email.required' => 'メールアドレスを入力してください',
           'password.required' => 'パスワードを入力してください',
        ];
    }

    // public function authenticate() {
    //     $this->ensureIsNotRateLimited(); 
    //     if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) 
    //     {
    //          RateLimiter::hit($this->throttleKey()); 
    //          throw ValidationException::withMessages([ 'email' => [trans('auth.failed')], 
    //         ]); 
    //     } RateLimiter::clear($this->throttleKey());
    //  }

}
