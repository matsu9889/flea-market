<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            'item_name' => ['required'],
            'description' => ['required', 'max:255'],
            'img_url' => ['required', 'image', 'mimes:jpeg,png', 'max:2048'],
            'categories' => ['required', 'array'],
            'condition' => ['required'],
            'price' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
            'item_name.required' => '商品名を入力してください',

            'description.required' => '商品説明を入力してください',
            'description.max' => '商品説明は255文字以内で入力してください',

            'img_url.required' => '商品画像を選択してください',
            'img_url.image' => '画像ファイルを選択してください',
            'img_url.mimes' => 'jpegまたはpng形式でアップロードしてください',
            'img_url.max' => '画像は2MB以内でアップロードしてください',

            'categories.required' => 'カテゴリを選択してください',

            'condition.required' => '商品の状態を選択してください',

            'price.required' => '価格を入力してください',
            'price.integer' => '価格は数字で入力してください',
            'price.min' => '価格は0円以上で入力してください',
        ];
    }
}
