<?php

namespace App\Http\Requests\Coffee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Helpers\MyHttpRequest;

class CoffeeUpdateRequest extends FormRequest
{
    private MyHttpRequest $myHttpRequest;

    public function __construct(MyHttpRequest $myHttpRequest)
    {
        $this->myHttpRequest = $myHttpRequest;
    }

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
            'name'        => 'required', 
            'image'       => 'image', 
            'price'       => 'required|numeric', 
            'type'        => 'required|integer', 
            'brand'       => 'required|integer', 
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.*'        => 'Please enter a valid coffee name', 
            'image.*'       => 'Please enter a valid coffee image', 
            'price.*'       => 'Please enter a valid coffee price', 
            'type.*'        => 'Please enter a valid coffee type', 
            'brand.*'       => 'Please enter a valid coffee brand', 
            'description.*' => 'Please enter a valid coffee description'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->myHttpRequest->validateBadRequest($validator);
    }
}
