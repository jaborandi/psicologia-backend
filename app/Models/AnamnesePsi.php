<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Anamnesepsi extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'anamnesepsi';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = ["municipe_id","escola","ano","apelido","gosta_apelido","pq_apelido","prefere_sozinho","muitos_amigos","quem_amigos","quem_melhor_amigo","oq_gosta_melhor_amigo","pais_casados","pais_moram_juntos","nome_pai","oq_pai_faz","da_bem_pai","nome_mae","oq_mae_faz","da_bem_mae","tem_irmaos","nome_irmaos","idade_irmaos","oq_irmaos_fazem","da_bem_irmaos","irmao_preferido","gosta_escola","pq_gosta_escola","oq_mais_gosta_escola","oq_menos_gosta_escola","repetiu_ano","qual_ano_pq","gosta_professores","professor_mais_gosta","qual_materia","materia_preferida","materia_menos_gosta","faz_tarefas","pais_ajudam_tarefa","pais_acompanham_nota","bravos_nota_baixa","notas_boas_como","presta_atencao","muito_arteiro","considera_bom_aluno","oq_quer_ser","assiste_mt_tv","oq_gosta_assistir","usa_celular_pc","oq_gosta_fazer_pc_celular","gosta_sair_casa","oq_gosta_fora_casa"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				municipes.nome LIKE ?  OR 
				anamnesepsi.apelido LIKE ?  OR 
				municipes.cpf LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"municipes.nome AS municipes_nome", 
			"anamnesepsi.escola AS escola", 
			"anamnesepsi.ano AS ano", 
			"anamnesepsi.data_hora AS data_hora", 
			"anamnesepsi.id AS id", 
			"municipes.id AS municipes_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"municipes.nome AS municipes_nome", 
			"anamnesepsi.escola AS escola", 
			"anamnesepsi.ano AS ano", 
			"anamnesepsi.data_hora AS data_hora", 
			"anamnesepsi.id AS id", 
			"municipes.id AS municipes_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"municipes.nome AS municipes_nome", 
			"anamnesepsi.escola AS escola", 
			"anamnesepsi.ano AS ano", 
			"anamnesepsi.apelido AS apelido", 
			"anamnesepsi.gosta_apelido AS gosta_apelido", 
			"anamnesepsi.pq_apelido AS pq_apelido", 
			"anamnesepsi.prefere_sozinho AS prefere_sozinho", 
			"anamnesepsi.muitos_amigos AS muitos_amigos", 
			"anamnesepsi.quem_amigos AS quem_amigos", 
			"anamnesepsi.quem_melhor_amigo AS quem_melhor_amigo", 
			"anamnesepsi.oq_gosta_melhor_amigo AS oq_gosta_melhor_amigo", 
			"anamnesepsi.pais_casados AS pais_casados", 
			"anamnesepsi.pais_moram_juntos AS pais_moram_juntos", 
			"anamnesepsi.nome_pai AS nome_pai", 
			"anamnesepsi.oq_pai_faz AS oq_pai_faz", 
			"anamnesepsi.da_bem_pai AS da_bem_pai", 
			"anamnesepsi.nome_mae AS nome_mae", 
			"anamnesepsi.oq_mae_faz AS oq_mae_faz", 
			"anamnesepsi.da_bem_mae AS da_bem_mae", 
			"anamnesepsi.tem_irmaos AS tem_irmaos", 
			"anamnesepsi.nome_irmaos AS nome_irmaos", 
			"anamnesepsi.idade_irmaos AS idade_irmaos", 
			"anamnesepsi.oq_irmaos_fazem AS oq_irmaos_fazem", 
			"anamnesepsi.da_bem_irmaos AS da_bem_irmaos", 
			"anamnesepsi.irmao_preferido AS irmao_preferido", 
			"anamnesepsi.gosta_escola AS gosta_escola", 
			"anamnesepsi.pq_gosta_escola AS pq_gosta_escola", 
			"anamnesepsi.oq_mais_gosta_escola AS oq_mais_gosta_escola", 
			"anamnesepsi.oq_menos_gosta_escola AS oq_menos_gosta_escola", 
			"anamnesepsi.repetiu_ano AS repetiu_ano", 
			"anamnesepsi.qual_ano_pq AS qual_ano_pq", 
			"anamnesepsi.gosta_professores AS gosta_professores", 
			"anamnesepsi.professor_mais_gosta AS professor_mais_gosta", 
			"anamnesepsi.qual_materia AS qual_materia", 
			"anamnesepsi.materia_preferida AS materia_preferida", 
			"anamnesepsi.materia_menos_gosta AS materia_menos_gosta", 
			"anamnesepsi.faz_tarefas AS faz_tarefas", 
			"anamnesepsi.pais_ajudam_tarefa AS pais_ajudam_tarefa", 
			"anamnesepsi.pais_acompanham_nota AS pais_acompanham_nota", 
			"anamnesepsi.bravos_nota_baixa AS bravos_nota_baixa", 
			"anamnesepsi.notas_boas_como AS notas_boas_como", 
			"anamnesepsi.presta_atencao AS presta_atencao", 
			"anamnesepsi.muito_arteiro AS muito_arteiro", 
			"anamnesepsi.considera_bom_aluno AS considera_bom_aluno", 
			"anamnesepsi.oq_quer_ser AS oq_quer_ser", 
			"anamnesepsi.assiste_mt_tv AS assiste_mt_tv", 
			"anamnesepsi.oq_gosta_assistir AS oq_gosta_assistir", 
			"anamnesepsi.usa_celular_pc AS usa_celular_pc", 
			"anamnesepsi.oq_gosta_fazer_pc_celular AS oq_gosta_fazer_pc_celular", 
			"anamnesepsi.gosta_sair_casa AS gosta_sair_casa", 
			"anamnesepsi.oq_gosta_fora_casa AS oq_gosta_fora_casa", 
			"anamnesepsi.data_hora AS data_hora", 
			"anamnesepsi.atualizado_em AS atualizado_em", 
			"anamnesepsi.id AS id", 
			"municipes.id AS municipes_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"municipes.nome AS municipes_nome", 
			"anamnesepsi.escola AS escola", 
			"anamnesepsi.ano AS ano", 
			"anamnesepsi.apelido AS apelido", 
			"anamnesepsi.gosta_apelido AS gosta_apelido", 
			"anamnesepsi.pq_apelido AS pq_apelido", 
			"anamnesepsi.prefere_sozinho AS prefere_sozinho", 
			"anamnesepsi.muitos_amigos AS muitos_amigos", 
			"anamnesepsi.quem_amigos AS quem_amigos", 
			"anamnesepsi.quem_melhor_amigo AS quem_melhor_amigo", 
			"anamnesepsi.oq_gosta_melhor_amigo AS oq_gosta_melhor_amigo", 
			"anamnesepsi.pais_casados AS pais_casados", 
			"anamnesepsi.pais_moram_juntos AS pais_moram_juntos", 
			"anamnesepsi.nome_pai AS nome_pai", 
			"anamnesepsi.oq_pai_faz AS oq_pai_faz", 
			"anamnesepsi.da_bem_pai AS da_bem_pai", 
			"anamnesepsi.nome_mae AS nome_mae", 
			"anamnesepsi.oq_mae_faz AS oq_mae_faz", 
			"anamnesepsi.da_bem_mae AS da_bem_mae", 
			"anamnesepsi.tem_irmaos AS tem_irmaos", 
			"anamnesepsi.nome_irmaos AS nome_irmaos", 
			"anamnesepsi.idade_irmaos AS idade_irmaos", 
			"anamnesepsi.oq_irmaos_fazem AS oq_irmaos_fazem", 
			"anamnesepsi.da_bem_irmaos AS da_bem_irmaos", 
			"anamnesepsi.irmao_preferido AS irmao_preferido", 
			"anamnesepsi.gosta_escola AS gosta_escola", 
			"anamnesepsi.pq_gosta_escola AS pq_gosta_escola", 
			"anamnesepsi.oq_mais_gosta_escola AS oq_mais_gosta_escola", 
			"anamnesepsi.oq_menos_gosta_escola AS oq_menos_gosta_escola", 
			"anamnesepsi.repetiu_ano AS repetiu_ano", 
			"anamnesepsi.qual_ano_pq AS qual_ano_pq", 
			"anamnesepsi.gosta_professores AS gosta_professores", 
			"anamnesepsi.professor_mais_gosta AS professor_mais_gosta", 
			"anamnesepsi.qual_materia AS qual_materia", 
			"anamnesepsi.materia_preferida AS materia_preferida", 
			"anamnesepsi.materia_menos_gosta AS materia_menos_gosta", 
			"anamnesepsi.faz_tarefas AS faz_tarefas", 
			"anamnesepsi.pais_ajudam_tarefa AS pais_ajudam_tarefa", 
			"anamnesepsi.pais_acompanham_nota AS pais_acompanham_nota", 
			"anamnesepsi.bravos_nota_baixa AS bravos_nota_baixa", 
			"anamnesepsi.notas_boas_como AS notas_boas_como", 
			"anamnesepsi.presta_atencao AS presta_atencao", 
			"anamnesepsi.muito_arteiro AS muito_arteiro", 
			"anamnesepsi.considera_bom_aluno AS considera_bom_aluno", 
			"anamnesepsi.oq_quer_ser AS oq_quer_ser", 
			"anamnesepsi.assiste_mt_tv AS assiste_mt_tv", 
			"anamnesepsi.oq_gosta_assistir AS oq_gosta_assistir", 
			"anamnesepsi.usa_celular_pc AS usa_celular_pc", 
			"anamnesepsi.oq_gosta_fazer_pc_celular AS oq_gosta_fazer_pc_celular", 
			"anamnesepsi.gosta_sair_casa AS gosta_sair_casa", 
			"anamnesepsi.oq_gosta_fora_casa AS oq_gosta_fora_casa", 
			"anamnesepsi.data_hora AS data_hora", 
			"anamnesepsi.atualizado_em AS atualizado_em", 
			"anamnesepsi.id AS id", 
			"municipes.id AS municipes_id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"municipe_id", 
			"escola", 
			"ano", 
			"apelido", 
			"gosta_apelido", 
			"pq_apelido", 
			"prefere_sozinho", 
			"muitos_amigos", 
			"quem_amigos", 
			"quem_melhor_amigo", 
			"oq_gosta_melhor_amigo", 
			"pais_casados", 
			"pais_moram_juntos", 
			"nome_pai", 
			"oq_pai_faz", 
			"da_bem_pai", 
			"nome_mae", 
			"oq_mae_faz", 
			"da_bem_mae", 
			"tem_irmaos", 
			"nome_irmaos", 
			"idade_irmaos", 
			"oq_irmaos_fazem", 
			"da_bem_irmaos", 
			"irmao_preferido", 
			"gosta_escola", 
			"pq_gosta_escola", 
			"oq_mais_gosta_escola", 
			"oq_menos_gosta_escola", 
			"repetiu_ano", 
			"qual_ano_pq", 
			"gosta_professores", 
			"professor_mais_gosta", 
			"qual_materia", 
			"materia_preferida", 
			"materia_menos_gosta", 
			"faz_tarefas", 
			"pais_ajudam_tarefa", 
			"pais_acompanham_nota", 
			"bravos_nota_baixa", 
			"notas_boas_como", 
			"presta_atencao", 
			"muito_arteiro", 
			"considera_bom_aluno", 
			"oq_quer_ser", 
			"assiste_mt_tv", 
			"oq_gosta_assistir", 
			"usa_celular_pc", 
			"oq_gosta_fazer_pc_celular", 
			"gosta_sair_casa", 
			"oq_gosta_fora_casa", 
			"id" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = true;
	const CREATED_AT = 'data_hora'; 
	const UPDATED_AT = 'atualizado_em'; 
}
