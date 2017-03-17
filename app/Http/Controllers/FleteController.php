<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Modelos\Softland\Factura;
use App\Motorista;
use App\Vehiculo;
use App\Flete;
use App\FleteItem;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;








class FleteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        if(!\Session::has('flete'))\Session::put('flete',array());
    }

    public function index(Request $request)
    {


      /*  $FactSoftland =Factura::where('ANULADA','N');*/

          $FacturaSoftland= Factura::name($request->get('q'))->where('ANULADA','N')->ordeRby('FECHA','ASC') ->paginate(8);



          return view('transacciones.fletes.index')->with('factura',$FacturaSoftland);
    }


    public function add(Factura $factura)
    {

        $flete=\Session::get('flete');
        $flete[$factura->FACTURA]=$factura;
        \Session::put('flete',$flete);


        return redirect()->route('fletes.index');


    }


    public function show()
    {
        
        $flete = \Session::get('flete');
        return view('transacciones.fletes.show')->with('flete', $flete);
    }


    public function delete(Factura $factura){

        $flete=\Session::get('flete');
        unset($flete[$factura->FACTURA]);
        \Session::put('flete',$flete);

        return redirect()->route('flete.show');

    }

    public function trash(){
        \Session::forget('flete');
        return redirect()->route('flete.show');
    }


   public function fletedetalle() {

         $ayudantes=motorista::all()->where ('estado','A');
         $vehiculos=vehiculo::all()->where ('estado','A');
        $flete=\Session::get('flete');
        return view('transacciones.fletes.detalle',compact('ayudantes'),compact('vehiculos'))->with('flete',$flete);

   }

  public function GuardarFlete(Request $request)
  {
            $cant=0;
             $flete=\Session::get('flete');
             $date = Carbon::now();
             $date=$date->format('d-m-y h:i:s');
              
            $maximo=DB::table('fletes')->max('flete');
            $idmotoristas=$request->preparador;
            $idvehiculo=$request->vehiculo;
            $kinicial=$request->kinicial;
            $numeroduc=count($flete);


            $Efletes=Flete::create([
            'flete'=>$maximo+1,
            'vehiculo_id'=>$idvehiculo,
            'motorista_id'=>$idmotoristas,
            'montototal'=>$this->total(),
            'numerofacturas'=>$numeroduc,
            'fecha'=>$date,
            'estado'=>'P',
            'kinicial'=>$kinicial,
            'usuariocreacion'=>\Auth::user()->name       
             ]);


             foreach ($flete as $facturas){
           $this->GuardarFleteDetalle($facturas,$Efletes->flete);
   
              }


  }

  public function GuardarFleteDetalle($facturas, $flete)
  {
        $flete_id=DB::table('fletes')->max('id'); 

       Fleteitem::create([
                        

                       'flete'=>$flete,
                       'flete_id'=>$flete_id,
                       'factura'=>$facturas->FACTURA,
                       'fecha'=>($facturas->FECHA),
                       'cliente'=>$facturas->CLIENTE,
                       'nombre'=>$facturas->EMBARCAR_A,
                       'total'=>$facturas->TOTAL_FACTURA,
                       'condicionpago'=>$facturas->CONDICION_PAGO,
                       'estado'=>'P'
            ])  ;

        \Session::forget('flete');

  }

  public function total(){
    $flete=\Session::get('flete');
    $total=0;
    foreach ($flete as $flete) {
        $total+=$flete->TOTAL_FACTURA;
    }
    return $total;
  }




    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }





    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }



    public function destroy($id)
    {
        //
    }
}
