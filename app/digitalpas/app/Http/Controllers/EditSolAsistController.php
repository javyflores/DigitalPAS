<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Entidad;
use App\Models\Sol_asistencia;

class EditSolAsistController extends Controller
{
    public function editar(Request $request)
    {
    	Session::put('reqr', $reqr);
        Session::put('estado', $estado);
    	
    	$req = $reqr;
        $solicitud = Sol_asistencia::find($req);

        return view('afiliado.editSolAsist', ['solicitud' => $solicitud]);
    }








    public function update(Request $request, $id)
    {
        $solicitud = solicitud::find($id);
        $solicitud->name = $request->input('name');
        $solicitud->email = $request->input('email');
        $solicitud->password = bcrypt($request->input('password'));
        $solicitud->save();

        return redirect()->route('solicituds.edit', $solicitud->id)->with('success', 'Usuario actualizado exitosamente');
    }
}
