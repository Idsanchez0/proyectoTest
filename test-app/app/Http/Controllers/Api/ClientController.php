<?php


namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TicketsAereo;
use Illuminate\Support\Facades\Validator;
use Exception;

class ClientController extends Controller
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
            $dataUser=User::get();
            return response()->json(['status' => true, 'user' => $dataUser], $this->successStatus);
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
                'nombre' =>'required',
                'correo' => 'required',
                'ciudad' => 'required',

            ],
            [
                'nombre.required' => 'Por favor ingrese el nombre',
                'correo.required' => 'Por favor ingrese el correo',
                'ciudad.required' => 'Por favor ingrese la ciudad',

            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'error' => $validator->errors()], $this->errorStatus);
        }

        try {


            $data=[
                'name' =>$request->nombre,
                'city' => $request->ciudad,
                'email' => $request->correo,

            ];

            $dataUser=User::find($id);

            $dataUser->update($data);

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
