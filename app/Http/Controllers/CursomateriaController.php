<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Cursomateria;
use App\Curso;
use App\Materia;
use App\Docente;
use Carbon\Carbon;
use Toastr;

class CursomateriaController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index()
    {
        $curma = Cursomateria::orderBy('created_at','DESC');
        return view('admin.cursomateria.index')->with('curma', $curma);
    }

    public function create()
    {
        $docente = Docente::select(
            DB::raw("CONCAT(doc_paterno,' ',doc_materno,' ',doc_nombre) AS nombre"),'id')
            ->where('doc_estado','=',1)
            ->orderBy('doc_paterno','DESC')
            ->pluck('nombre', 'id');
        $curso = Curso::select('cur_nombre','id')
            ->orderBy('cur_nombre','DESC')
            ->pluck('cur_nombre','id');
        $materia = Materia::select('mat_nombre','id')
            ->orderBy('mat_nombre','DESC')
            ->pluck('','id');
        return view('admin.cursomateria.create')
                ->with('docente', $docente)
                ->with('curso', $curso)
                ->with('materia', $materia);
    }

    public function store(Request $request)
    {
        try{
            $curma = new Cursomateria($request->all());
            $curma->iduregistra = Auth::user()->id;
            $curma->iduactualiza = Auth::user()->id;
            $curma->save();
            Toastr::success('Los datos se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('curma.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try{
            $docente = Docente::select(
                DB::raw("CONCAT(doc_paterno,' ',doc_materno,' ',doc_nombre) AS nombre"),'id')
                ->where('doc_estado','=',1)
                ->orderBy('doc_paterno','DESC')
                ->pluck('nombre', 'id');
            $curso = Curso::select('cur_nombre','id')
                ->orderBy('cur_nombre','DESC')
                ->pluck('cur_nombre','id');
            $materia = Materia::select('mat_nombre','id')
                ->orderBy('mat_nombre','DESC')
                ->pluck('','id');
            $curma = Cursomateria::find($id);
            Toastr::warning('Usted va modificar datos','Modificar');
            return view('admin.cursomateria.edit')
                    ->with('curma', $curma)
                    ->with('docente', $docente)
                    ->with('curso', $curso)
                    ->with('materia', $materia);
        }catch(\Exception $ex){
            Toastr::error('No se puede realizar la modificación','Error');
            return redirect()->route('curma.index');
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $curma = Cursomateria::find($id);
            $curma->fill($request->all());
            $curma->iduactualiza = Auth::user()->id;
            $curma->update();
            Toastr::success('Los datos se actualizaron de manera correcta','Actualizado');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('curma.index');
    }
}
