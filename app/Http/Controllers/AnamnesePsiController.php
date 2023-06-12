<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnamnesepsiAddRequest;
use App\Http\Requests\AnamnesepsiEditRequest;
use App\Models\Anamnesepsi;
use Illuminate\Http\Request;
use Exception;
class AnamnesepsiController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Anamnesepsi::query();
		if($request->search){
			$search = trim($request->search);
			Anamnesepsi::search($query, $search);
		}
		$query->leftJoin("municipes", "anamnesepsi.municipe_id", "=", "municipes.id");
		$orderby = $request->orderby ?? "anamnesepsi.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		if($request->escola){
			$vals = $request->escola;
			$query->whereIn("anamnesepsi.escola", $vals);
		}
		if($request->ano){
			$vals = $request->ano;
			$query->whereIn("anamnesepsi.ano", $vals);
		}
		if($request->data_hora){
			$fromDate = $request->data_hora['from'] ?? null;
			$toDate = $request->data_hora['to'] ?? null;
			if($fromDate && $toDate){
				$query->whereRaw("anamnesepsi.data_hora BETWEEN ? AND ?", [$fromDate, $toDate]);
			}
			elseif($fromDate){
				$query->whereRaw("anamnesepsi.data_hora >= ?", [$fromDate]);
			}
			elseif($toDate){
				$query->whereRaw("anamnesepsi.data_hora <= ?", [$toDate]);
			}
		}
		$records = $this->paginate($query, Anamnesepsi::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Anamnesepsi::query();
		$query->leftJoin("municipes", "anamnesepsi.municipe_id", "=", "municipes.id");
		$record = $query->findOrFail($rec_id, Anamnesepsi::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(AnamnesepsiAddRequest $request){
		$modeldata = $request->validated();
		
		//save Anamnesepsi record
		$record = Anamnesepsi::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AnamnesepsiEditRequest $request, $rec_id = null){
		$query = Anamnesepsi::query();
		$record = $query->findOrFail($rec_id, Anamnesepsi::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $request->validated();
			$record->update($modeldata);
		}
		return $this->respond($record);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = Anamnesepsi::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		return $this->respond($arr_id);
	}
}
