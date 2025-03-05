<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Método para mostrar el listado de usuarios
    public function index()
    {
        // Obtener todos los usuarios (sin incluir el usuario autenticado si no es administrador)
        $users = User::all(); // O puedes añadir filtros según el rol del usuario autenticado

        return view('user.index', compact('users'));
    }

    // Método para mostrar el formulario de creación de usuario
    public function create()
    {
        return view('user.create'); // Vista para crear un nuevo usuario
    }

    // Método para almacenar un nuevo usuario
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:100',
            'apellidos' => 'nullable|string|max:100',
            'sexo' => 'nullable|in:Masculino,Femenino',
            'pais' => 'nullable|string|max:100',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'admin' => 'required|in:0,1', // Validación para que solo sea 0 o 1
        ]);

        // Crear el nuevo usuario
        $user = new User();
        $user->name = $request->input('name');
        $user->apellidos = $request->input('apellidos');
        $user->sexo = $request->input('sexo');
        $user->pais = $request->input('pais');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // Encriptamos la contraseña
        $user->admin = $request->input('admin'); // Asignamos el valor de admin
        $user->save(); // Guardamos el usuario

        return redirect()->route('user.index')->with('success', 'Usuario creado correctamente.');
    }


    // Método para mostrar el formulario de edición de perfil
    public function edit(User $user)
    {
        return view('user.edit', compact('user')); // Pasamos el usuario a la vista
    }

    // Método para actualizar los datos del usuario
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id); // Obtener el usuario por su ID

            // Validación de los datos
            $request->validate([
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'name' => 'required|string|max:100',
                'apellidos' => 'nullable|string|max:100',
                'sexo' => 'nullable|in:Masculino,Femenino',
                'pais' => 'nullable|string|max:100',
                'password' => 'nullable|string|min:8|confirmed',
                'admin' => 'required|in:0,1', // Validación para que solo sea 0 o 1
            ]);

            // Actualizar los datos del usuario
            $user->name = $request->input('name');
            $user->apellidos = $request->input('apellidos');
            $user->sexo = $request->input('sexo');
            $user->pais = $request->input('pais');
            $user->email = $request->input('email');
            $user->admin = $request->input('admin'); // Actualizamos el campo admin

            // Si el campo de contraseña no está vacío, la actualizamos
            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->save(); // Guardamos los cambios

            return redirect()->route('user.index')->with('success', 'Perfil actualizado correctamente.');
        } catch (\Exception $e) {
            // Capturamos cualquier error y mostramos el mensaje
            return redirect()->route('user.index')->with('error', 'Error al actualizar el perfil: ' . $e->getMessage());
        }
    }


    // Método para eliminar un usuario
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete(); // Eliminar el usuario

            return redirect()->route('user.index')->with('success', 'Usuario eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('error', 'Error al eliminar el usuario: ' . $e->getMessage());
        }
    }
}
