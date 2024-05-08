<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puntuaciones;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class PuntuacionesController extends Controller
{
    public function index()
    {
        // Obtener los usuarios ordenados por puntuación de forma descendente
        $usuarios = User::join('puntuaciones', 'users.id', '=', 'puntuaciones.id_usuario')
            ->orderBy('puntuaciones.puntuacion', 'desc')
            ->get(['users.name', 'puntuaciones.puntuacion']);


        
        return view('clasificacion', compact('usuarios'));
    }

    public function portada(Request $request)
    {
        $usuario = Auth::user();
        $usuarioId = $usuario ? $usuario->id : null;

        $puntuacion = puntuaciones::where('id_usuario', $usuarioId)
            ->value('puntuacion');

        return view('portada', ['puntuacion' => $puntuacion]);
    }

    public function actualizarPuntuacion(Request $request)
    {
        $usuario = $request->user();
        puntuaciones::where('id_usuario', $usuario->id)->increment('puntuacion');

        // ir a página de portada
        return redirect()->route('portada');
    }

    public function verificarPuntuacion(Request $request)
    {
        $usuario = $request->user();

        $puntuacion = puntuaciones::where('id_usuario', $usuario->id)
            ->value('puntuacion');

        if ($puntuacion == 2 or $puntuacion >= 4) {
            // El usuario tiene una puntuación de 2, continúa mostrando la página actual
            return view('juegos3');
        } else {
            // El usuario no tiene una puntuación de 2, redirige a la página de portada
            return redirect()->route('portada');
        }
    }


    public function juego(puntuaciones $puntuacion)
    {
        if ($puntuacion == 0) {
            // El usuario tiene una puntuación de 2, continúa mostrando la página actual
            return view('juegos3');
        } else {
            // El usuario no tiene una puntuación de 2, redirige a la página de portada
            return redirect()->route('portada');
        }
    }

    

    public function reiniciar(User $usuario)
    {
        // Lógica para reiniciar la puntuación a 0
        $puntuacion = puntuaciones::where('id_usuario', $usuario->id)->first();

        if ($puntuacion) {
            $puntuacion->update(['puntuacion' => 0]);
        }

        return redirect()->back()->with('success', 'Puntuación reiniciada con éxito.');
    }

}
