<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Estudiante;
use App\Tutor;
use App\User;
use Carbon\Carbon;
use Toastr;
use DB;

class EstudianteController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(){
        $estudiante = Estudiante::orderBy('created_at','DESC')->get();
        return view('admin.estudiante.index')->with('estudiante', $estudiante);
    }

    public function create(){
        $tutor = Tutor::select(
            DB::raw("CONCAT(tut_paterno,' ',tut_materno,' ',tut_nombre) AS nombre"),'id')
            ->orderBy('tut_paterno','DESC')
            ->pluck('nombre', 'id');
        return view('admin.estudiante.create')->with('tutor', $tutor);
    }
    
    public function store(Request $request){
        try{
            $estudiante = new Estudiante($request->all());
            $estudiante->iduregistra = Auth::user()->id;
            $estudiante->iduactualiza = Auth::user()->id;
            $estudiante->save();
            Toastr::success('Los datos se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('estudiante.index');
    }

    public function show($id){
        
    }

    public function edit($id){
        try{
            $tutor = Tutor::select(
                DB::raw("CONCAT(tut_paterno,' ',tut_materno,' ',tut_nombre) AS nombre"),'id')
                ->orderBy('tut_paterno','DESC')
                ->pluck('nombre', 'id');
            $estudiante = Estudiante::find($id);
            Toastr::warning('Usted va modificar datos','Modificar');
            return view('admin.estudiante.edit')
                    ->with('estudiante', $estudiante)
                    ->with('tutor', $tutor);
        }catch(\Exception $ex){
            Toastr::error('No se puede realizar la modificación','Error');
            return redirect()->route('estudiante.index');
        }
    }

    public function update(Request $request, $id){
        try{
            $estudiante = Estudiante::find($id);
            $estudiante->fill($request->all());
            $estudiante->iduactualiza = Auth::user()->id;
            $estudiante->update();
            Toastr::success('Los datos se actualizaron de manera correcta','Actualizado');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('estudiante.index');
    }
}
