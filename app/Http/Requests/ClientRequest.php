<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        'last-name' => 'required',
        'first-name' => 'required',
        'gender' => 'required',
        'email' => 'required|email',
        'postcode' => 'required|max:8|regex:/^[0-9-]+$/',
        'address' => 'required',
        'opinion' => 'required|max:120',
        ];
    }
        public function messages()
    {
        return [
            'last-name.required' => 'ラストネームを入力してください',
            'first-name.required' => 'ファーストネームを入力してください',
            'gender.required' => '性別を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'postcode.regex' => '半角数字を入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.max' => '８文字を超えています',
            'address.required' => '住所を入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.max' => '120文字を超えています',
        ];
    }


        public function prepareForValidation()
    {
        $this->merge(['postcode' => mb_convert_kana($this->postcode, 'as')]);
    }

}
