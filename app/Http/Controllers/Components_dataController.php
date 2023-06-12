<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components Data Contoller
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Controller
 */
class Components_dataController extends Controller{
	public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['users_name_exist','users_email_exist']]);
    }
	/**
     * municipe_id_option_list Model Action
     * @return array
     */
	function municipe_id_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,nome AS label FROM municipes ORDER BY nome ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * anamnesepsi_municipe_id_autofill Model Action
     * @return array
     */
	function anamnesepsi_municipe_id_autofill(Request $request){
		$sqltext = "SELECT pai, mae FROM municipes WHERE id=:value" ;
		$query_params = [];
		$query_params['value'] = request()->get('value');
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * check if name value already exist in Users
	 * @param string $value
     * @return bool
     */
	function users_name_exist(Request $request, $value){
		$exist = DB::table('users')->where('name', $value)->value('name');   
		if($exist){
			return "true";
		}
		return "false";
	}
	/**
     * check if email value already exist in Users
	 * @param string $value
     * @return bool
     */
	function users_email_exist(Request $request, $value){
		$exist = DB::table('users')->where('email', $value)->value('email');   
		if($exist){
			return "true";
		}
		return "false";
	}
	/**
     * ano_option_list Model Action
     * @return array
     */
	function ano_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT ano AS value,ano AS label FROM anamnesepsi ORDER BY ano ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
}
