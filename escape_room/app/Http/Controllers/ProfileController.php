<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Puntuaciones;
use App\Models\Puntuaciones as ModelsPuntuaciones;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Laravel\Fortify\Rules\CurrentPassword;

use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
public function admin() {
    if (auth()->user()->rol == 1){
        $usuarios = User::all();

        return view('admin', compact('usuarios'));
    }
    else {
        return redirect()->route('portada');
    }

   
}
    
    //  *Update the user's profile information.
     
    // public function updateRol(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }


    public function update(ProfileUpdateRequest $request, User $user)
    {
        //$name = $request->input('name', $user->name);
        //$email = $request->input('email', $user->email);
        //$password = $request->input('password', $user->password);
        //$rol = $request->input('rol', $user->rol);

        if ($request->name == null) {
            $name = $user->name;
        } else {
            $name = $request->name;
        }

        if ($request->email == null) {
            $email = $user->email;
        } else {
            $email = $request->email;
        }

        if ($request->password == null) {
            $password = $user->password;
        } else {
            $password = $request->password;
        }

        if ($user->rol == 0) {
            $rol = 0;
        } else {
            $rol = 1;
        }

        
        // Actualiza el modelo con los nuevos valores
        $user->update([
            'name' => $name,
            'email' => $email,
            'password' => $password, //!== 'passwordPorDefecto' ? bcrypt($password) : $user->password,
            'rol' => $rol
        ]);


        /*$user->name = $request->name;
        $user->email = $request->email;
        $user->password = 123456789;
        $user->rol = 0;

        $user->save();*/

        return redirect()->route("perfil.show", $user);
    }


    public function updateRol
    (Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'rol.*' => 'required|in:0,1', // Asegura que cada rol sea 0 o 1
        ]);

        try {
            // Actualiza los roles de los usuarios en la base de datos
            foreach ($request->rol as $userId => $rol) {
                User::where('id', $userId)->update(['rol' => $rol]);
            }

            // Redirige de vuelta con un mensaje de éxito
            return redirect()->back()->with('success', '¡Los roles de los usuarios se han actualizado correctamente!');
        } catch (\Exception $e) {
            // Maneja cualquier excepción que ocurra durante el proceso de actualización
            return redirect()->back()->with('error', 'Se produjo un error al actualizar los roles de los usuarios. Por favor, inténtalo de nuevo.');
        }
    }



    public function guardarCambios(Request $request)
    {
        // Validación de datos (puedes personalizar esto según tus necesidades)
       /*  $request->validate([
            'nombreUsuario' => 'required|string|max:255',
            'emailUsuario' => 'required|email|max:255',

        ]); */

        // Crea una instancia de ProfileUpdateRequest y pasa los datos validados
        $profileRequest = new ProfileUpdateRequest($request->validated());

        // Llama al método update y pasa la instancia de ProfileUpdateRequest
        $this->update($profileRequest);

        $request->update([
            'name' => $request->input('name', $request->name),
            'email' => $request->input('email', $request->email),
            'password' => $request->input('password', $request->password),
            // Agrega más campos según sea necesario
        ]);
    
        return redirect()->route("perfil.show", $request);
        // Puedes agregar más lógica aquí según tus necesidades

        // Redirige a la vista de perfil o a donde desees
        return redirect()->route('ErabiltzaileKudeaketa')->with('success', 'Cambios guardados exitosamente');
    }


    // public function show(){
    //     $usuario = auth()->user();
    //     return view('perfil')->with('usuario', $usuario);
    // }

    public function show(){
        $usuario = Auth::user();
        $puntuacion = Puntuaciones::where('id_usuario', $usuario->id)->first();

        return view('perfil', compact('usuario', 'puntuacion'));
    }

    public function showKudeatu(){
        $usuario = Auth::user();
        $puntuacion = Puntuaciones::where('id_usuario', $usuario->id)->first();

        return view('ErabiltzaileKudeaketa', compact('usuario', 'puntuacion'));
    }

    public function kudeatu(){
        return view('erabiltzaileKudeaketa');
    }
    /**
     * Delete the user's account.
     */
    public function destroyAdmin(Request $request)
    {
        $userId = $request->query('id');

        // Verificar si el usuario con el ID proporcionado existe
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('portada')->with('error', 'El usuario no existe');
        }

        // Eliminar puntuaciones relacionadas
        Puntuaciones::where('id_usuario', $userId)->delete();

        // Eliminar directamente al usuario
        $user->delete();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('portada')->with('status', 'Cuenta eliminada exitosamente');
    }



    
  
    
}
