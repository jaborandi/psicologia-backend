<?php
namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class AnamnesepsiAddRequest extends FormRequest
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
            
				"municipe_id" => "nullable",
				"escola" => "nullable",
				"ano" => "nullable|string",
				"apelido" => "nullable|string",
				"gosta_apelido" => "nullable",
				"pq_apelido" => "nullable|string",
				"prefere_sozinho" => "nullable|string",
				"muitos_amigos" => "nullable|string",
				"quem_amigos" => "nullable|string",
				"quem_melhor_amigo" => "nullable|string",
				"oq_gosta_melhor_amigo" => "nullable|string",
				"pais_casados" => "nullable",
				"pais_moram_juntos" => "nullable",
				"nome_pai" => "nullable|string",
				"oq_pai_faz" => "nullable|string",
				"da_bem_pai" => "nullable|string",
				"nome_mae" => "nullable|string",
				"oq_mae_faz" => "nullable|string",
				"da_bem_mae" => "nullable|string",
				"tem_irmaos" => "nullable",
				"nome_irmaos" => "nullable|string",
				"idade_irmaos" => "nullable|string",
				"oq_irmaos_fazem" => "nullable|string",
				"da_bem_irmaos" => "nullable|string",
				"irmao_preferido" => "nullable|string",
				"gosta_escola" => "nullable",
				"pq_gosta_escola" => "nullable|string",
				"oq_mais_gosta_escola" => "nullable|string",
				"oq_menos_gosta_escola" => "nullable|string",
				"repetiu_ano" => "nullable",
				"qual_ano_pq" => "nullable|string",
				"gosta_professores" => "nullable|string",
				"professor_mais_gosta" => "nullable|string",
				"qual_materia" => "nullable|string",
				"materia_preferida" => "nullable|string",
				"materia_menos_gosta" => "nullable|string",
				"faz_tarefas" => "nullable|string",
				"pais_ajudam_tarefa" => "nullable|string",
				"pais_acompanham_nota" => "nullable",
				"bravos_nota_baixa" => "nullable",
				"notas_boas_como" => "nullable|string",
				"presta_atencao" => "nullable|string",
				"muito_arteiro" => "nullable|string",
				"considera_bom_aluno" => "nullable|string",
				"oq_quer_ser" => "nullable|string",
				"assiste_mt_tv" => "nullable",
				"oq_gosta_assistir" => "nullable|string",
				"usa_celular_pc" => "nullable",
				"oq_gosta_fazer_pc_celular" => "nullable|string",
				"gosta_sair_casa" => "nullable",
				"oq_gosta_fora_casa" => "nullable|string",
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
