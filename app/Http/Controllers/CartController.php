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
             $date = Carbon::now();
            $maximo=DB::table('Tickets')->max('ticket');;
            $preparador=$request->preparador;
            $idpreparador=$request->id;
            
            
            
       $ticket=Ticket::create([
           'preparador'=>$preparador,
           'estado'=>'P',
           'ticket'=>$maximo+1,
           'cant_pedido'=>count($cart),
           'fecha_inicio'=>$date,
           'usuario_creacion'=>\Auth::user()->name
       ]);

       foreach ($cart as $cart){
           $this->GuadarTicketDetallePedido($cart,$ticket->ticket);
           $this->GuardarTicketDetalleProductos($cart,$ticket->ticket);
       }

            
                      return redirect()->route('Canasta.ImpresionTicket')->with('ticket',$ticket->ticket);

      

       
        
    }

    public function GuadarTicketDetallePedido($cart, $ticket){
            Ticket_detalle_pedido::create([
                       'id_ticket'=>$ticket,
                       'pedido'=>$cart->pedidos,
                       'cliente'=>$cart->Cliente,
                       'nombre'=>$cart->Nombre_Cliente,
                       'direccion'=>$cart->Direccion_Cliente,
                       'monto'=>$cart->Total_a_Facturar,
                       'estado'=>'P',
                       'vendedor'=>$cart->Vendedor,
                       'nombre_vendedor'=>$cart->Nombre_Vendedor
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
  

  public function ImpresionTicket(){
                
                    return view('Canasta.impresion');
    
  }



}
