<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Ayudante;
use Laracasts\Flash\Flash;
Use Carbon\Carbon;
Use App\Http\Requests\VehiculoRequest;




class AyudanteController extends Controller
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
        //

           /**
       *$vehiculos=vehiculo::orderby('id','ASC')->paginate(8);
    
      *  return view('maestros.vehiculos.index')->with('vehiculos',$vehiculos);
    */ 
     $preparadores=ayudante::orderby('id','ASC')->paginate(8);
    return view('maestros.ayudantes.index')-> with('preparadores',$preparadores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('maestros.ayudantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


         $fecha=Carbon::now();    
        $ayudantes=new Ayudante($request->all());
        $ayudantes->save(); 
        
        Flash::success('Se ha registrado El Preparador de Forma Existosa')->important();
        return redirect()->route('ayudantes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
       /*
        $preparadores=new ayudante($request->all());    
             
        $preparadores->save(); 
        
        Flash::success('Se ha registrado Preparador de Forma Existosa')->important();
        return redirect()->route('ayudantes.index');
       */ 
           return redirect()->route('ayudantes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preparadores=ayudante::find($id);
        return view('maestros.ayudantes.edit')->with('preparadores',$preparadores);
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
        dd('aqui estamos');
     $preparadores=ayudantes::find($id);
        $preparadores->delete();
        flash::error('El Vehiculo se Borro sin problema')->important();
        return redirect()->route('ayudantes.index');
    }
}
