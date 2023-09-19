<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdmnominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');

        $query2 = DB::select("SELECT * FROM nomina.dat_pers_afi");
        $afiliados2 = json_encode($query2);
        $afiliados2 = json_decode($afiliados2, true);
        // Obtener la cantidad total de afiliados
        $totalAfiliados = count($afiliados2);
        /*
        // Obtener solo 50 afiliados por página
        $afiliados = afiliados::paginate(50);
        // Obtener el número de página actual
        $currentPage = $afiliados->currentPage();
        */
        $query = DB::select("SELECT * FROM nomina.dat_pers_afi LIMIT 50");
        $afiliados = json_encode($query);
        $afiliados = json_decode($afiliados, true);

        return view('nomina.admnomina', ['codigo' => $codigo, 'usuario' => $usuario, 'afiliados' => $afiliados, 'totalAfiliados' => $totalAfiliados]);
        //
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
