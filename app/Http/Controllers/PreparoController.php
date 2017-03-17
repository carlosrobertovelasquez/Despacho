<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Modelos\TCargaPedido;
use App\Modelos\Ticket;
use App\Modelos\Ticket_detalle_pedido;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Flyer;
use Jenssegers\Date\Date;
use PDF;
   



class PreparoController extends Controller
{



     public function __construct()
        {
            $this->middleware('auth');
            Date::setLocale('es');
            Carbon::setLocale('es');
        }
    public function index()
    {
     
                
                $ticket=DB::Connection('softland')->select("select Ticket.estado, Ticket.ticket, Preparador.nombre as preparador,
Ticket_d_p.cliente,SUBSTRING(Ticket_d_p.nombre ,1,20) as nombre,Ticket_d_p.pedido,  ticket.fecha_inicio
from 
Despacho.dbo.tickets  Ticket,
Despacho.dbo.tickets_detalle_pedidos Ticket_d_p,
Despacho.dbo.ayudantes Preparador,
Despacho.dbo.estado_ticket estado_ticket
where
Ticket.ticket=Ticket_d_p.id_ticket and
Ticket.preparador=Preparador.id and
Ticket.estado=estado_ticket.tipo and
 Ticket.estado in ('01','02','03') order by Ticket.ticket");

                return view('preparos.index', array('Carbon'=>'Carbon\Carbon'))->with('ticket',$ticket);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         dd('store');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         
          $fechaSistema = Carbon::now()->toTimeString();
        DB::table('Despacho.dbo.tickets')->where('ticket',$id)->update( ['estado'=>'02','fecha_inicio_preparacion'=>$fechaSistema] );
         //DB::table('Despacho.dbo.tickets')->where('ticket',$id)->update( ['estado'=>'02'] );
        return redirect()->route('preparos.index');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
         
         $fechaSistema = Carbon::now()->toTimeString();
        DB::table('Despacho.dbo.tickets')->where('ticket',$id)->update( ['estado'=>'03', 'fecha_fin_preparacion'=>$fechaSistema] );
         //DB::table('Despacho.dbo.tickets')->where('ticket',$id)->update( ['estado'=>'03'] );
        return redirect()->route('preparos.index');
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
      

  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
     
     dd('aqui esta destroy');

    }

    public function  pdf($id)
    {

        $EncabezadoTicket=DB::Connection('softland')->select("select Ticket.ticket,Preparador.nombre as preparador, 
        estado_ticket.nombre  as estado,
        Ticket_d_p.cliente,Ticket_d_p.nombre,Ticket_d_p.direccion,Ticket_d_p.nombre_vendedor,Ticket_d_p.nota
        from 
        Despacho.dbo.tickets  Ticket,
        Despacho.dbo.tickets_detalle_pedidos Ticket_d_p,
        Despacho.dbo.ayudantes Preparador,
        Despacho.dbo.estado_ticket estado_ticket
        where
        Ticket.ticket=Ticket_d_p.id_ticket and
        Ticket.preparador=Preparador.id and
        Ticket.estado=estado_ticket.tipo and
        Ticket.ticket='$id'");
        //Detalle de Ticket
        $pedidosSoftLinea=DB::Connection('softland')->select("select 
          pl.ARTICULO,
          pl.LOTE,
          sum((pl.CANTIDAD_A_FACTURA+pl.CANTIDAD_BONIFICAD)) CANTIDAD,
          pl.PEDIDO,
          art.DESCRIPCION, 
          CONVERT(VARCHAR(10),lt.FECHA_VENCIMIENTO, 103) as  FECHA_VENCIMIENTO 
            from 
            Despacho.dbo.tickets_detalle_pedidos tdp,
            SOFTLAND.DRO_UNI.ARTICULO art,
            softland.DRO_UNI.PEDIDO_LINEA pl,
            SOFTLAND.DRO_UNI.LOTE lt
            where 
            pl.PEDIDO=tdp.pedido and
            pl.articulo=art.ARTICULO and
            pl.LOTE=lt.LOTE and
            pl.ARTICULO=lt.ARTICULO and
            tdp.id_ticket='$id'
            group by pl.LOTE,pl.ARTICULO,pl.PEDIDO,art.DESCRIPCION,lt.FECHA_VENCIMIENTO");

        $pdf=PDF::loadView('Canasta.impresion',compact('pedidosSoftLinea'),compact('EncabezadoTicket'));
        $paper_size = array(0,0,614,425);
        return $pdf->setPaper('mediaA4','landscape')->stream('Canasta.pdf');
    }




    public function consultaTicket(){
        $ticket=DB::Connection('softland')->select("select  estado_ticket.nombre as estado , Ticket.ticket, Preparador.nombre as preparador,
Ticket_d_p.cliente,SUBSTRING(Ticket_d_p.nombre ,1,20) as nombre,Ticket_d_p.pedido,ticket.fecha_inicio,fecha_inicio_preparacion,fecha_fin_preparacion
from 
Despacho.dbo.tickets  Ticket,
Despacho.dbo.tickets_detalle_pedidos Ticket_d_p,
Despacho.dbo.ayudantes Preparador,
Despacho.dbo.estado_ticket estado_ticket
where
Ticket.ticket=Ticket_d_p.id_ticket and
Ticket.preparador=Preparador.id and
Ticket.estado=estado_ticket.tipo and
ticket.fecha_inicio_preparacion is null order by Ticket.ticket");
       return view('preparos.show')->with('ticket',$ticket);

    }

public function revisar(Request $request, $id){

  $vineta=DB::Connection('softland')->select("
        select Ticket_d_p.pedido,Ticket.vultos,Ticket.ticket,Preparador.nombre as preparador, 
        estado_ticket.nombre  as estado,
        Ticket_d_p.cliente,Ticket_d_p.nombre,Ticket_d_p.direccion,Ticket_d_p.nombre_vendedor,Ticket_d_p.nota
        from 
        Despacho.dbo.tickets  Ticket,
        Despacho.dbo.tickets_detalle_pedidos Ticket_d_p,
        Despacho.dbo.ayudantes Preparador,
        Despacho.dbo.estado_ticket estado_ticket
        where
        Ticket.ticket=Ticket_d_p.id_ticket and
        Ticket.preparador=Preparador.id and
        Ticket.estado=estado_ticket.tipo and
        Ticket.ticket='$id'");
 

      

     
    return view('preparos.revisar',compact('vineta'));
}



public function impresionvineta(Request $request,$id){

    DB::table('Despacho.dbo.tickets')->where('ticket',$id)->update( ['estado'=>'04', 'vultos'=>$request->vultos] );
        
$EncabezadoTicket=DB::Connection('softland')->select("select Ticket.ticket,Ticket.vultos,Ticket.fecha_inicio as fecha,Preparador.nombre as preparador, 
        estado_ticket.nombre  as estado,
        Ticket_d_p.cliente,Ticket_d_p.nombre,Ticket_d_p.direccion,Ticket_d_p.nombre_vendedor,Ticket_d_p.nota,Ticket_d_p.pedido
        from 
        Despacho.dbo.tickets  Ticket,
        Despacho.dbo.tickets_detalle_pedidos Ticket_d_p,
        Despacho.dbo.ayudantes Preparador,
        Despacho.dbo.estado_ticket estado_ticket
        where
        Ticket.ticket=Ticket_d_p.id_ticket and
        Ticket.preparador=Preparador.id and
        Ticket.estado=estado_ticket.tipo and
        Ticket.ticket='$id'");

         $pdf=PDF::loadView('preparos.impresionvineta',compact('EncabezadoTicket'));
        $paper_size = array(0,0,614,425);
        return $pdf->download('vineta.pdf');


}
     
}
