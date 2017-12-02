<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Docente;
use Carbon\Carbon;
use Toastr;

class DocenteController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index()
    {
        $docente = Docente::orderBy('created_at','DESC')->get();
        return view('admin.docente.index')->with('docente', $docente);
    }

    public function create()
    {
        return view('admin.docente.create');
    }

    public function store(Request $request)
    {
        try{
            $docente = new Docente($request->all());
            $docente->iduregistra = Auth::user()->id;
            $docente->iduactualiza = Auth::user()->id;
            $docente->save();
            Toastr::success('Los datos se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('docente.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try{
            $docente = Docente::find($id);    
            Toastr::warning('Usted va modificar datos','Modificar');
            return view('admin.docente.edit')
                    ->with('docente', $docente);
        }catch(\Exception $ex){
            Toastr::error('No se puede realizar la modificación','Error');
            return redirect()->route('docente.index');
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $docente = Docente::find($id);
            $docente->fill($request->all());
            $docente->iduactualiza = Auth::user()->id;
            $docente->update();
            Toastr::success('Los datos se actualizaron de manera correcta','Actualizado');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('docente.index');
    }
}
