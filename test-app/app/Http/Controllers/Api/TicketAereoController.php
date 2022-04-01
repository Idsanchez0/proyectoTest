<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TicketsAereo;
use Illuminate\Support\Facades\Validator;
use Exception;

class TicketAereoController extends Controller
{
    private $successStatus = 200;
    private $errorStatus = 500;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        try {
            $dataUser=TicketsAereo::get();
            return response()->json(['status' => true, 'user' => $dataUser], $this->successStatus);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'error' => 'Algo a sucedido por favor intente déspues de unos minutos', 'message' => $e], $this->errorStatus);
        }
    }


    public function getTicker(Request $request)
    {


        try {
            $data=TicketsAereo::where('destination',$request->destino)
                    ->where('departure','>=',$request->salida)->where('arrival','>=',$request->retorno)->get();
            return response()->json(['status' => true, 'user' => $data], $this->successStatus);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'error' => 'Algo a sucedido por favor intente déspues de unos minutos', 'message' => $e], $this->errorStatus);
        }
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

        $validator = Validator::make(
            $request->all(),
            [

                'destino' => 'required',
                'aerolinea' => 'required',
                'precio' => 'required',
                'numero_escalas' => 'required',
                'salida' => 'required|date',
                'retorno' => 'required|date',
                'duracion' => 'required',
            ],
            [

                'destino.required' => 'Por favor ingrese el destino',
                'aerolinea.required' => 'Por favor ingrese la aerolinea',
                'precio.required' => 'Por favor ingrese el precio',
                'numero_escalas.required' => 'Por favor ingrese el num escalas',
                'salida.required' => 'La fecha de salida es requerida',
                'retorno.required' => 'La fecha de retorno es requerida',
                'duracion.required' => 'La duracion es requerida',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'error' => $validator->errors()], $this->errorStatus);
        }

        try {


            $data=[

                'destination' => $request->destino,
                'airline' => $request->aerolinea,
                'price' => $request->precio,
                'stopover_number' => $request->numero_escalas,
                'departure' => $request->salida,
                'arrival' => $request->retorno,
                'duration' => $request->duracion,
            ];

            TicketsAereo::create($data);

            return response()->json(['status' => true, 'user' => 'ingreso exitoso'], $this->successStatus);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'error' => 'Algo a sucedido por favor intente déspues de unos minutos', 'message' => $e], $this->errorStatus);
        }
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
        $validator = Validator::make(
            $request->all(),
            [

                'destino' => 'required',
                'aerolinea' => 'required',
                'precio' => 'required',
                'numero_escalas' => 'required',
                'salida' => 'required|date',
                'retorno' => 'required|date',
                'duracion' => 'required',
            ],
            [

                'destino.required' => 'Por favor ingrese el destino',
                'aerolinea.required' => 'Por favor ingrese la aerolinea',
                'precio.required' => 'Por favor ingrese el precio',
                'numero_escalas.required' => 'Por favor ingrese el num escalas',
                'salida.required' => 'La fecha de salida es requerida',
                'retorno.required' => 'La fecha de retorno es requerida',
                'duracion.required' => 'La duracion es requerida',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'error' => $validator->errors()], $this->errorStatus);
        }

        try {


            $data=[

                'destination' => $request->destino,
                'airline' => $request->aerolinea,
                'price' => $request->precio,
                'stopover_number' => $request->numero_escalas,
                'departure' => $request->salida,
                'arrival' => $request->retorno,
                'duration' => $request->duracion,
            ];

            $dataTicket=TicketsAereo::find($id);

            $dataTicket->update($data);

            return response()->json(['status' => true, 'user' => 'actualizacion exitosa'], $this->successStatus);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'error' => 'Algo a sucedido por favor intente déspues de unos minutos', 'message' => $e], $this->errorStatus);
        }
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
