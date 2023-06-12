<?php
namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class UsuariosEditRequest extends FormRequest
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
            
				"login" => "nullable|string",
				"senha" => "nullable|string",
				"email" => "nullable|email",
				"foto" => "nullable|string",
				"nivel" => "nullable|string",
				"user_role_id" => "nullable|numeric",
				"apagado_em" => "nullable|date",
				"apagado" => "nullable|string",
				"orgao" => "nullable|numeric",
				"status" => "nullable|string",
				"nome" => "nullable|string",
				"suborgao" => "nullable|string",
        ];
    }

	public function messages()
    {
        return [
            //using laravel default validation messages
        ];
    }

	/**
     * If validator fails return the exception in json form
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
