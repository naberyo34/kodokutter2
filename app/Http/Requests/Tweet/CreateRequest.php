<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    // フォームから投稿されたデータを受け取るメソッド 名前はinputタグのnameに準ずる
    public function tweet(): string
    {
        return $this->input('tweet');
    }
    /**
     * Determine if the user is authorized to make this request.
     * リクエストを認証できるかを判定するメソッド
     * この関数がtrueを返す条件において、リクエストが認証される
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 連想配列でバリデーションを書いて返却することで反映される
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tweet' => 'required|max:140'
        ];
    }

    // 現在ログインしているユーザーのIDを取得する
    // ここで取得したIDをツイートの保存時に使う
    public function userId(): int
    {
        return $this->user()->id;
    }
}
