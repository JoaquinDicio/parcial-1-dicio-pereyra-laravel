<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class userController extends Controller
{
    public function registerUser(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:users',
                'name' => 'required|string',
                'password' => 'required|string|min:6',
            ]);

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->role_id = 2;
            $user->save();

            return redirect()->route('home');
        } catch (ValidationException $e) {

            $errorMessages = $e->validator->errors();

            $customErrorMessages = [];

            if ($errorMessages->has('email')) {
                $customErrorMessages['email'] = 'El correo electrónico ya está en uso o es inválido.';
            }

            if ($errorMessages->has('name')) {
                $customErrorMessages['name'] = 'El nombre de usuario es obligatorio.';
            }

            if ($errorMessages->has('password')) {
                $customErrorMessages['password'] = 'La contraseña es obligatoria y debe tener al menos 6 caracteres.';
            }

            return response()->json(['error' => $customErrorMessages], 422);

        } catch (QueryException $e) {
            return response()->json(['error' => 'El correo electrónico ya está en uso.'], 409);
        }
    }
}

