<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Materia;
use Toastr;
use Carbon\Carbon;

class MateriaController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index()
    {
        $materia = Materia::orderBy('created_at')->get();
        return view('admin.materia.index')->with('materia', $materia);
    }

    public function create()
    {
        return view('admin.materia.create');
    }

    public function store(Request $request)
    {
        try{
            $materia = new Materia($request->all());
            $materia->iduregistra = Auth::user()->id;
            $materia->iduactualiza = Auth::user()->id;
            $materia->save();
            Toastr::success('Los datos se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('materia.index');
    }

    public function edit($id)
    {
        try{
            $materia = Materia::find($id);
            Toastr::warning('Usted va modificar datos','Modificar');
            return view('admin.materia.edit')
                    ->with('materia', $materia);
        }catch(\Exception $ex){
            Toastr::error('No se puede realizar la modificación','Error');
            return redirect()->route('materia.index');
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $materia = Materia::find($id);
            $materia->fill($request->all());
            $materia->iduactualiza = Auth::user()->id;
            $materia->update();
            Toastr::success('Los datos se actualizaron de manera correcta','Actualizado');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('materia.index');
    }
}
