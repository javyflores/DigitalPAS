<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usr_afi_sys;

class RegafiliadoController extends Controller
{
    public function index()
    {

        return view('regusuarios.regafiliado');
    }

    public function crear()
    {
        // Retornar vista para crear un nuevo usuario
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        // Crear un nuevo usuario
        $user = User::create($validatedData);

        // Redirigir a la vista de detalles del usuario
        return redirect()->route('users.show', $user->id);
    }

    public function show($id)
    {
        // Obtener el usuario por su ID
        $user = User::findOrFail($id);

        // Retornar vista con los detalles del usuario
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        // Obtener el usuario por su ID
        $user = User::findOrFail($id);

        // Retornar vista para editar el usuario
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:8',
        ]);

        // Obtener el usuario por su ID
        $user = User::findOrFail($id);

        // Actualizar los datos del usuario
        $user->update($validatedData);

        // Redirigir a la vista de detalles del usuario
        return redirect()->route('users.show', $user->id);
    }

    public function destroy($id)
    {
        // Obtener el usuario por su ID
        $user = User::findOrFail($id);

        // Eliminar el usuario
        $user->delete();

        // Redirigir a la lista de usuarios
        return redirect()->route('users.index');
    }
}