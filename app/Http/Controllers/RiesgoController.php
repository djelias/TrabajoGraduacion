<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Riesgo;
use Riesgo1\http\Request\RiesgoRequest;
use RealRashid\SweetAlert\Facades\Alert;

class RiesgoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');
        $riesgos = Riesgo::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('riesgo.index',compact('riesgos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $riesgos = Riesgo::all();
        return view('riesgo.create', compact('riesgos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

          'id',
          'catRiesgo'=>'required|alpha_spaces',
        ]);
        
        Riesgo::create($request->all());
         Alert::success('Riesgo agregado con éxito');
        return redirect()->route('riesgo.index')->with('success','Riesgo creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riesgos = Riesgo::find($id);
      return view('riesgo.show',compact('riesgos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idRiesgo)
    {
        $riesgos = Riesgo::find($idRiesgo);
        return view('riesgo.edit',compact('riesgos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idRiesgo)
    {
        $this->validate($request,[
          'id',
          'catRiesgo'
        ]);
        Riesgo::find($idRiesgo)->update($request->all());
        return redirect()->route('riesgo.index')->with('success','Riesgo actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idRiesgo)
    {
        try{
            Riesgo::find($idRiesgo)->delete();
        return redirect()->route('riesgo.index')->with('success','Riesgo eliminado con exito');
    		} catch  (\Illuminate\Database\QueryException $e){
                 Alert::danger('No se Puede eliminar este registro porque esta asociado con otros datos');
        return redirect()->route('riesgo.index');
        }
    }
}