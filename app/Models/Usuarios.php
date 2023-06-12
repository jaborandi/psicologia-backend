<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Usuarios extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'usuarios';
	

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
	protected $fillable = ["login","senha","email","foto","nivel","user_role_id","apagado_em","apagado","orgao","status","nome","suborgao"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				id LIKE ?  OR 
				login LIKE ?  OR 
				senha LIKE ?  OR 
				email LIKE ?  OR 
				foto LIKE ?  OR 
				nivel LIKE ?  OR 
				apagado LIKE ?  OR 
				status LIKE ?  OR 
				nome LIKE ?  OR 
				suborgao LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"id", 
			"login", 
			"senha", 
			"email", 
			"foto", 
			"nivel", 
			"user_role_id", 
			"apagado_em", 
			"apagado", 
			"orgao", 
			"status", 
			"nome", 
			"suborgao" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id", 
			"login", 
			"senha", 
			"email", 
			"foto", 
			"nivel", 
			"user_role_id", 
			"apagado_em", 
			"apagado", 
			"orgao", 
			"status", 
			"nome", 
			"suborgao" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"id", 
			"login", 
			"senha", 
			"email", 
			"foto", 
			"nivel", 
			"user_role_id", 
			"apagado_em", 
			"apagado", 
			"orgao", 
			"status", 
			"nome", 
			"suborgao" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"id", 
			"login", 
			"senha", 
			"email", 
			"foto", 
			"nivel", 
			"user_role_id", 
			"apagado_em", 
			"apagado", 
			"orgao", 
			"status", 
			"nome", 
			"suborgao" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id", 
			"login", 
			"senha", 
			"email", 
			"foto", 
			"nivel", 
			"user_role_id", 
			"apagado_em", 
			"apagado", 
			"orgao", 
			"status", 
			"nome", 
			"suborgao" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
