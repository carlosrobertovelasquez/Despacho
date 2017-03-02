<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\TCargaPedido;
use App\Modelos\Pedido;
use App\Modelos\Pedido_linea;
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
    public function index()


    {
             $pedidos=TCargaPedido ::orderby('pedidos','ASC')->whereNull('num_ticket') ->paginate(8);

        return view('transacciones.pedidos.index')->with('pedidos',$pedidos) ;

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
     
      
            $pedidosSoft=DB::Connection('softland')->select("select * from DRO_UNI.PEDIDO WHERE PEDIDO='$id'");
           
           $pedidosSoftLinea=DB::Connection('softland')->select(
            "select pedl.PEDIDO_LINEA,pedl.BODEGA,pedl.LOTE,pedl.ARTICULO,art.DESCRIPCION, pedl.estado,pedl.CANTIDAD_PEDIDA,pedl.CANTIDAD_A_FACTURA,pedl.CANTIDAD_BONIFICAD from
            DRO_UNI.PEDIDO_LINEA pedl,
            DRO_UNI.ARTICULO art
            where PEDIDO='$id' and
            art.ARTICULO=pedl.ARTICULO") ;
   
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
