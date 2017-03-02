<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Vehiculo;
use Laracasts\Flash\Flash;
Use Carbon\Carbon;
Use App\Http\Requests\VehiculoRequest;

class VehiculoController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
      */


    public function __construct()
    {
        $this->middleware('auth');
    }




    public function index()
    {
        $vehiculos=vehiculo::orderby('id','ASC')->paginate(8);

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
    public function store(VehiculoRequest $request)
    {
       // revisar los requess
        $fecha=Carbon::now();    
        $vehiculo=new vehiculo($request->all());
        $vehiculo->create_User='SA';
        $vehiculo->update_user='SA';      
        $vehiculo->save(); 
        
        Flash::success('Se ha registrado La Placa de Forma Existosa')->important();
        return redirect()->route('vehiculos.index');
        



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pedidos)
    {
        dd($peidos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo=vehiculo::find($id);
        return view('maestros.vehiculos.edit')->with('vehiculo',$vehiculo);
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
       
      
        $vehiculo=vehiculo::find($id);
        $vehiculo->placa=$request->placa;
        $vehiculo->modelo=$request->modelo;
        $vehiculo->estado=$request->estado;
        $vehiculo->kinicial=$request->kinicial;
        $vehiculo->kfinal=$request->kfinal;
        $vehiculo->ano=$request->ano;
        $vehiculo->propio=$request->propio;
        $vehiculo->combustible=$request->combustible;
        $vehiculo->save();
          Flash::success('Se Actualizado Con Exito')->important();
        return redirect()->route('vehiculos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo=vehiculo::find($id);
        $vehiculo->delete();
        flash::error('El Vehiculo se Borro sin problema')->important();
        return redirect()->route('vehiculos.index');

    }
}
