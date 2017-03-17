<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Modelos\TCargaPedido;
use App\Modelos\Pedido;
use App\Modelos\Pedido_linea;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;


class PedidoController extends Controller
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
    public function index(Request $request)
    {
     //        $this->carga();


        
               


             $pedidos=TCargaPedido ::name($request->get('q'))->orderby('fecha_hora_aprobacion','ASC')->whereNull('num_ticket')->paginate(8);

        return view('transacciones.pedidos.index')->with('pedidos',$pedidos) ;

    }

    public function carga(){


             
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)

    {


      
            $pedidosSoft=DB::Connection('softland')->select("select 
 Ped.PEDIDO,Ped.ESTADO,Ped.AUTORIZADO, Ped.FECHA_HORA,Ped.FECHA_APROBACION,Ped.USUARIO, ped.VENDEDOR,ven.NOMBRE ,
Ped.CLIENTE_ORIGEN,Ped.NOMBRE_CLIENTE,Ped.DIRECCION_FACTURA,Ped.TOTAL_A_FACTURAR,getDATE() as fecha_hora_Carga,ped.OBSERVACIONES 
from
softland.DRO_UNI.PEDIDO Ped,
softland.DRO_UNI.VENDEDOR ven
where 
Ped.VENDEDOR=ven.VENDEDOR AND
Ped.PEDIDO='$id'");
           
           $pedidosSoftLinea=DB::Connection('softland')->select(
            "select pedl.LOTE,pedl.ARTICULO,art.DESCRIPCION, 
             sum(pedl.CANTIDAD_PEDIDA) as CANTIDAD_PEDIDA,
             sum(pedl.CANTIDAD_A_FACTURA) as CANTIDAD_A_FACTURA,
             sum(pedl.CANTIDAD_BONIFICAD) as CANTIDAD_BONIFICAD
             from
             DRO_UNI.PEDIDO_LINEA pedl,
             DRO_UNI.ARTICULO art
             where PEDIDO='$id' and
             art.ARTICULO=pedl.ARTICULO
             group by pedl.lote,pedl.ARTICULO,art.DESCRIPCION
             order by pedl.articulo") ;
   
           return view ('transacciones.pedidos.show')->with('ped',$pedidosSoft)->with('pedlinea',$pedidosSoftLinea) ;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pedido,$conse,$articulo)
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
