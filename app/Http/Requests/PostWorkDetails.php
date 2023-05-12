<?php

namespace App\Http\Requests;

use App\Rules\CategoriesValidationRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
class PostWorkDetails extends FormRequest
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
            'categories' => ['required', new CategoriesValidationRule],
        ];
    }
    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
        $validator->setFallbackMessages([]);
        return $validator;
    }
}
