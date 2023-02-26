<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /**
         * Verificar que el usuario que crea el producto es el loguedado
         */
        if($this->user_id == auth()->user()->id){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // Si no esta publicado solo guarda estos datos
        $rules = [ 
            'name' => 'required',
            'slug' => 'required|unique:products',
            'status' => 'required|in:1,2'

        ];

        // Si el estado es publicado guarda todos estos datos
        if($this->status ==2 ){
            $rules = array_merge($rules, [

                'category_id' => 'required',
                'tags' => 'required',
                'description' => 'required',
                'price' => 'required'
            ]);
        }

        return $rules;
    }
}
