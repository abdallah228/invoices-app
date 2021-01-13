<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //
            'product_name' => 'required|unique:products,product_name,'.$this->id,
            'section_id'=>'required',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
        'product_name.required'=>'يجب ان تدخل اسم المنتج',
        'product_name.unique'=>'هذا المنتج موجود من قبل',
        'section_id.required'=>'من فضلك اختار اسم القسم',
        'description.required'=>'يجب ان تدخل وصف المنتج',
        ];
    }
}
