<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use DB;
//use Fpdf;

use App\Carreras;
use App\Grupos_acta;
use App\ciclos;
use App\Http\Requests;
use App\Clases\ImprimeActa;
use App\Asignacion_acta;
class actasControlador extends Controller
{

    public function inicio() {
    	$asignacion = Asignacion_acta::join('control.grupos_acta', 'asignacion_acta.id_grupos_acta', '=', 'grupos_acta.id')
    		->join('control.ciclos','asignacion_acta.id_ciclos','=','ciclos.id')
    		->join('control.carreras','carreras.id','=','id_carrera')
            ->select('asignacion_acta.*', 'grupos_acta.nombre','ciclos.nombre_ciclo','carreras.nombre AS nombrec')->get();
    	return view('controlViews.actas',['asignacion'=> $asignacion]);
    }

    public function agregarActa() {
    	$carreras = Carreras::where('id_campus', 1)->get();
    	$grupos = Grupos_acta::where('id_campus', 1)->get();
    	$ciclos = ciclos::all();
    	//$carreras = DB::select('select * from carreras');
    	return view('controlViews.agregarActa',['carreras' => $carreras,
    		'grupos'=>$grupos,
    		'ciclos'=>$ciclos]);

    }

    public function guardarActa(Request $request) {
    	//Validamos los campos del formulario
    	$validacion = \Validator::make($request->all(),[
    			'clavedse' => 'required',
    			'archivo' => 'required'
    		]);
    	//Vaciamos los datos en un arreglo
    	if ($validacion->fails()) {
    		return redirect()->back()->withErrors($validacion->errors());
    	} else {
    		//solicitamos todo los campos de formulario						
			$carrera = $request->idCarrera;
			$ciclo = $request->idCiclo;
			$grupo = $request->idGrupo;			
			$turno = $request->turno;
			$dse = $request->clavedse;
			$mod = $request->esco;
			$file = $request->file('archivo');
			//verificamos el tipo de archivo que subio el usuario
			$extension = $file->getClientOriginalExtension();			
			if ($extension == "CSV" || $extension == "csv") {
				$imprimeActas = new ImprimeActa($carrera,$ciclo,$grupo,$turno,$file,$mod,$dse);
				$imprimeActas->leerCSV();
				return redirect()->action('actasControlador@inicio');

			} else {
				return redirect()->back()->withErrors([ $file->getClientOriginalName()." : Archivo no soportado"]);
			}			
    	}
    	
    	//$post = $request->all();
    	
    }

	public function exportpdf(Request $request){
		return ImprimeActa::imprimePDF($request->idAsignacion);
	}
}
