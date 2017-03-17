<?php

namespace App\Http\Controllers;
use App\Modelos\Pedido;
use App\Modelos\Pedido_linea;
use App\Ayudante;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modelos\TCargaPedido;
use App\Modelos\Ticket;
use App\Modelos\Ticket_detalle_pedido;
use App\Modelos\Ticket_detalle_producto;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Collection;
use Illuminate\Database\Query\Builder;






class CartController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		if(!\Session::has('cart'))\Session::put('cart',array());
	}
    // Show card
    

    public function index(){
        return view('Canasta.index');
    }
    public function show(){
         $cart=\Session::get('cart');
             
         return view('Canasta.show')->with('cart',$cart);  	 
    	
    }
    //add item
    public function add(TcargaPedido $pedido)
    {
                
        $cart=\Session::get('cart');   
            
       $cart[$pedido->pedidos]=$pedido;
       \Session::put('cart',$cart);
       
        return redirect()->route('pedidos.index');
      

    }


    public function pdf($ticket2)
    {

        //Asigancion de Encabezado de Ticket

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
Ticket.ticket='$ticket2'
");




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
            tdp.id_ticket='$ticket2'
            group by pl.LOTE,pl.ARTICULO,pl.PEDIDO,art.DESCRIPCION,lt.FECHA_VENCIMIENTO
");

        $pdf=PDF::load_html('Canasta.impresion',compact('pedidosSoftLinea'),compact('EncabezadoTicket'));
        $pdf->set_paper('a4','portrait');
        $pdf->render();
        return $pdf->stream('Canasta.pdf');
 
 //       $pdf = PDF::loadView('pruebaparapdf');
 //       $pdf->set_paper(array(0, 0, 595.28, 420.94), "portrait");
 //       return $pdf->download('Canasta.pdf');


    }


    public function delete(TcargaPedido $pedido){

        $cart=\Session::get('cart');
        unset($cart[$pedido->pedidos]);
        \Session::put('cart',$cart);

        return redirect()->route('Canasta.show');

    }


    // delete item
    // update item
    // trash c
    public function trash(){
        \Session::forget('cart');
        return redirect()->route('Canasta.show');
    }
    // Total

    public function TicketDetalle(){
       
        $ayudantes=ayudante::all()->where ('estado','A');
        $cart=\Session::get('cart');
        return view('Canasta.detalle',compact('ayudantes'))->with('cart',$cart);
    }

    public function GuardarTicket(Request $request){
             echo $request->email;
             $cant=0;
             $cart=\Session::get('cart');
             $date = Carbon::now()->toDateTimeString();
            $maximo=DB::table('Tickets')->max('ticket');;
            $preparador=$request->preparador;
            $idpreparador=$request->id;
            
            
            
       $ticket=Ticket::create([
           'preparador'=>$preparador,
           'estado'=>'01',
           'ticket'=>$maximo+1,
           'cant_pedido'=>count($cart),
           'fecha_inicio'=>$date,
           'usuario_creacion'=>\Auth::user()->name
       ]);

       foreach ($cart as $cart){
           $this->GuadarTicketDetallePedido($cart,$ticket->ticket);
           $this->GuardarTicketDetalleProductos($cart,$ticket->ticket);

       }

        $ticket2=$ticket->ticket;
        return redirect()->route('preparos.index' );



    }

    public function GuadarTicketDetallePedido($cart, $ticket){
            Ticket_detalle_pedido::create([
                       'id_ticket'=>$ticket,
                       'pedido'=>$cart->pedidos,
                       'cliente'=>$cart->Cliente,
                       'nombre'=>$cart->Nombre_Cliente,
                       'direccion'=>$cart->Direccion_Cliente,
                       'monto'=>$cart->Total_a_Facturar,
                       'estado'=>'01',
                       'vendedor'=>$cart->Vendedor,
                       'nombre_vendedor'=>$cart->Nombre_Vendedor,
                       'nota'=>$cart->nota
            ])  ;  


            //Actualizamos la Tabla de Carga pera el numero de Ticket
         $date = Carbon::now();

       $updates = DB::table('TCargaPedidos')
	->where('pedidos', '=', $cart->pedidos)
	->update([
		'num_Ticket' => $ticket,'Fecha_hora_ticket'=>$date
		]);    
    }

  public function GuardarTicketDetalleProductos($cart,$ticket){
             
           $pedidoLinea=Pedido_linea ::where ('PEDIDO','=',$cart->pedidos)->get();
        
            foreach ($pedidoLinea as $pedidoLinea){
      
           Ticket_detalle_producto::create([     
           'ticket'=>$ticket,
           'pedido'=>$pedidoLinea->PEDIDO,
           'pedido_linea'=>$pedidoLinea->PEDIDO_LINEA,
           'bodega'=>$pedidoLinea->BODEGA,
           'lote'=>$pedidoLinea->LOTE,
           'articulo'=>$pedidoLinea->ARTICULO,
           'precio_unitario'=>$pedidoLinea->PRECIO_UNITARIO,
           'cantidad_pedida'=>$pedidoLinea->CANTIDAD_PEDIDA,
           'cantidad_a_facturar'=>$pedidoLinea->CANTIDAD_A_FACTURAR,
           'cantidad_bonificad'=>$pedidoLinea->CANTIDAD_BONIFICAD

           
           ]);
       }
              
              \Session::forget('cart');
             
      
         
  }
  




}
