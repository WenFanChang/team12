<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMemberRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:191',
            'oid' => 'required',
            'position' => 'required|string|min:2|max:191',
            //'height' => 'required|numeric|min:150|max:220',
            'height' => 'nullable',
            //'weight' => 'required|numeric|min:40|max:120|lt:height', // lt = less than, lg = larger than
            'weight' => 'nullable',
            'year' => 'required|numeric|min:1|max:15',
            //'year' => 'nullable', 
            'age' => 'required|numeric|min:16|max:30',
            'nationality' => 'required|string|min:2|max:191'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "團員名稱 為必填",
            "name.min" => "團員名稱 至少需2個字元",
            "oid.required" => "樂團編號 為必填",
            "position.required" => "團員位置 為必填",
            /*"height.required" => "團員身高 為必填",
            "height.numeric" => "團員身高 必須為數字",
            "height.min" => "團員身高 範圍必須介於150~220之間",
            "height.max" => "團員身高 範圍必須介於150~220之間",
            "weight.required" => "團員體重 為必填",
            "weight.numeric" => "團員身高 必須為數字",
            "weight.min" => "團員體重 範圍必須介於40~120之間",
            "weight.max" => "團員體重 範圍必須介於150~220之間",*/
            "year.required" => "團員年資 為必填",
            "year.min" => "團員年資 範圍必須介於1~16之間",
            "year.max" => "團員年資 範圍必須介於1~16之間",
            "age.required" => "團員年齡 為必填",
            "age.min" => "團員年齡 範圍必須介於16~30之間",
            "age.max" => "團員年齡 範圍必須介於16~30之間",
            "nationality.required" => "團員國籍 為必填",
            "weight.lt" => "身高 必須大於 體重",
        ];

    }
}
