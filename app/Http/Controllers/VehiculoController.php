<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Vehiculo;
use Laracasts\Flash\Flash;

class VehiculoController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos=vehiculo::orderby('id','ASC')->paginate(10);

        return view('maestros.vehiculos.index')->with('vehiculos',$vehiculos);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('maestros.vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // revisar los requess
         
        $vehiculo=new vehiculo($request->all());
        $vehiculo->create_User='SA';
        $vehiculo->update_user='SA';
        $vehiculo->save(); 

        Flash::success('Se ha registrado La Placa de Forma Existosa');
        return redirect()->route('vehiculos.index');
        



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
