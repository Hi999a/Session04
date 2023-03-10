<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name'=>'required|unique:product',
            'price'=>'required|numeric|min:1',
            'file'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên sản phẩm không rỗng',
            'name.unique'=>$this->name.' đã tồn tại'
        ];
    }
}
