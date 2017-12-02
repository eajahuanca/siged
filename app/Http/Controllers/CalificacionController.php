<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Calificacion;
use App\Estudiante;
use App\Curso;
use App\Materia;
use Carbon\Carbon;
use Toastr;

class CalificacionController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index()
    {
        $calificacion = Calificacion::orderBy('created_at','DESC')->get();
        return view('admin.calificacion.index')->with('calificacion', $calificacion);
    }

    public function create()
    {
        $estudiante = Estudiante::select(
            DB::raw("CONCAT(est_paterno,' ',est_materno,' ',est_nombre) AS nombre"),'id')
            ->where('est_estado','=',1)
            ->orderBy('est_paterno','DESC')
            ->pluck('nombre', 'id');
        $curso = Curso::select('cur_nombre','id')
            ->where('cur_estado','=',1)
            ->orderBy('cur_nombre','ASC')
            ->pluck('cur_nombre','id');
        $materia = Materia::select('mat_nombre','id')
            ->where('mat_estado','=',1)
            ->orderBy('mat_nombre','ASC')
            ->pluck('mat_nombre','id');
        return view('admin.calificacion.create')
            ->with('estudiante', $estudiante)
            ->with('curso', $curso)
            ->with('materia', $materia);
    }

    public function store(Request $request)
    {
        try{
            $calificacion = new Calificacion($request->all());
            $calificacion->iduregistra = Auth::user()->id;
            $calificacion->iduactualiza = Auth::user()->id;
            $calificacion->save();
            Toastr::success('Los datos se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('calificacion.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try{
            $calificacion = Calificacion::find($id);
            $estudiante = Estudiante::select(
                DB::raw("CONCAT(est_paterno,' ',est_materno,' ',est_nombre) AS nombre"),'id')
                ->orderBy('est_paterno','DESC')
                ->pluck('nombre', 'id');
            $curso = Curso::orderBy('cur_nombre','ASC')->pluck('cur_nombre','id');
            $materia = Materia::orderBy('mat_nombre','ASC')->pluck('mat_nombre','id');
            Toastr::warning('Usted va modificar datos','Modificar');
            return view('admin.calificacion.create')
                ->with('calificacion', $calificacion)
                ->with('estudiante', $estudiante)
                ->with('curso', $curso)
                ->with('materia', $materia);
        }catch(\Exception $ex){
            Toastr::error('No se puede realizar la modificación','Error');
            return redirect()->route('calificacion.index');
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $calificacion = Calificacion::find($id);
            $calificacion->fill($request->all());
            $calificacion->iduactualiza = Auth::user()->id;
            $calificacion->update();
            Toastr::success('Los datos se actualizaron de manera correcta','Actualizado');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('calificacion.index');
    }
}
