<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Inscripcion;
use App\Estudiante;
use App\Curso;
use Carbon\Carbon;
use Toastr;

class InscripcionController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index()
    {
        $inscripcion = Inscripcion::orderBy('created_at','DESC')->get();
        return view('admin.inscripcion.index')->with('inscripcion', $inscripcion);
    }
    
    public function create()
    {
        $estudiante = Estudiante::select(
            DB::raw("CONCAT(est_paterno,' ',est_materno,' ',est_nombre, ' - ',est_ci) AS nombre"),'id')
            ->where('est_estado','=',1)
            ->orderBy('est_paterno','DESC')
            ->pluck('nombre', 'id');
        $curso = Curso::select('cur_nombre','id')
            ->where('cur_estado','=',1)
            ->orderBy('cur_nombre','DESC')
            ->pluck('cur_nombre', 'id');
        return view('admin.inscripcion.create')
            ->with('estudiante', $estudiante)
            ->with('curso', $curso);
    }

    public function store(Request $request)
    {
        try{
            $inscripcion = new Inscripcion($request->all());
            $inscripcion->iduregistra = Auth::user()->id;
            $inscripcion->iduactualiza = Auth::user()->id;
            $inscripcion->save();
            Toastr::success('Los datos se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('inscripcion.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try{
            $inscripcion = Inscripcion::find($id);
            $estudiante = Estudiante::select(
                DB::raw("CONCAT(est_paterno,' ',est_materno,' ',est_nombre, ' - ',est_ci) AS nombre"),'id')
                ->orderBy('est_paterno','DESC')
                ->pluck('nombre', 'id');
            $curso = Curso::select('cur_nombre','id')
                ->orderBy('cur_nombre','DESC')
                ->pluck('cur_nombre', 'id');
            return view('admin.inscripcion.edit')
                ->with('inscripcion', $inscripcion)
                ->with('estudiante', $estudiante)
                ->with('curso', $curso);
        }catch(\Exception $ex){
            Toastr::error('No se puede realizar la modificación','Error');
            return redirect()->route('inscripcion.index');
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $inscripcion = Inscripcion::find($id);
            $inscripcion->fill($request->all());
            $inscripcion->iduactualiza = Auth::user()->id;
            $inscripcion->update();
            Toastr::success('Los datos se actualizaron de manera correcta','Actualizado');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('inscripcion.index');
    }
}
