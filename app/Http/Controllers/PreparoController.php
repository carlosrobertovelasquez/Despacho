<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;
use Illuminate\Http\Request;
use App\Modelos\TCargaPedido;
use App\Modelos\Ticket;
use App\Modelos\Ticket_detalle_pedido;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
   



class PreparoController extends Controller
{



     public function __construct()
        {
            $this->middleware('auth');
        }
    public function index()
    {
     

        $ticket=Ticket ::orderby('ticket','ASC')->whereNull('fecha_inicio_preparacion')->get() ;
        $ticket_d_p=Ticket_detalle_pedido ::all() ;
                return view('preparos.index')->with('ticket',$ticket)->with('ticket_d_p',$ticket_d_p);
        
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
    public function show($id)
    {


      
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
