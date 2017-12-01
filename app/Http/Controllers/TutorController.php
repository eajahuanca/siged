<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use Carbon\Carbon;
use Toastr;

class TutorController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(){
        $tutor = Tutor::orderBy('created_at','DESC')->get();
        return view('admin.tutor.index')->with('tutor', $tutor);
    }

    public function create(){
        return view('admin.tutor.create');
    }
    
    public function store(Request $request){
        try{
            $tutor = new Tutor($request->all());
            $tutor->save();
            Toastr::success('Los datos fueron almacenados de manera satisafactoria','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('tutor.index');
    }

    public function edit($id){
        try{
            $tutor = Tutor::find($id);
            Toastr::warning('Usted va modificar datos','Modificar');
            return view('admin.tutor.edit')->with('tutor', $tutor);
        }catch(\Exception $ex){
            Toastr::error('No se puede realizar la modificación','Error');
            return redirect()->route('tutor.index');
        }
    }

    public function update(Request $request, $id){
        try{
            $tutor = Tutor::find($id);
            $tutor->fill($request->all());
            $tutor->update();
            Toastr::success('Los datos se actualizaron de manera correcta','Actualizado');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return redirect()->route('tutor.index');
    }
}
