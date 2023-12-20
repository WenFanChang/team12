<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrchestraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:100',
            'company' => 'required|string|min:2|max:100',
            'city' => 'required|string|min:2|max:100',
            'style' => 'required|string|min:2|max:100'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "團隊名稱 為必填",
            "name.min" => "團隊名稱 至少需2個字元",
            "company.required" => "公司名稱 為必填",
            "company.min" => "公司名稱 至少需2個字元",
            "city.required" => "公司位置 為必填",
            "city.min" => "公司位置 至少需2個字元",
            "style.required" => "曲風類別 為必填",
            "style.min" => "曲風類別 至少需2個字元",
        ];
    }
}