<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\Auth;
use Illuminate\Http\Request;
use App\Curso;
use Carbon\Carbon;
use Toastr;

class CursoController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }
    public function index()
    {
        $curso = Curso::orderBy('created_at','DESC')->get();
        return view('admin.curso.index')->with('cursodata', $curso);
    }

    public function create()
    {
        return view('admin.curso.create');
    }

    public function store(Request $request)
    {
        try{
            $curso = new Curso($request->all());
            $curso->iduregistra = Auth::user()->id; 
            $curso->iduactualiza = Auth::user()->id;
            $curso->save();
            Toastr::success('Los datos del Curso: '.$curso->cur_nombre.', se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        } 
        return redirect()->route('curso.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try{
            $curso = Curso::find($id);
            Toastr::warning('Usted va modificar datos','Modificar');
            return view('admin.curso.edit')
                    ->with('curso', $curso);
        }catch(\Exception $ex){
            Toastr::error('No se puede realizar la modificación','Error');
            return redirect()->route('curso.index');
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $curso = Curso::find($id);
            $curso->fill($request->all());
            $curso->update();
            Toastr::success('Los datos del curso:  '.$curso->cur_nombre.', se actualizaron de manera correcta','Actualizado');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('curso.index');
    }
}
