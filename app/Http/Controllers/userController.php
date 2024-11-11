<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Suscription;
use App\Models\Service;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function getHome()
    {
        $services = Service::all();
        $subscriptions = auth()->user() ? auth()->user()->subscriptions->pluck('service_id')->toArray() : [];

        return view('users.home', compact('services', 'subscriptions'));
    }
    public function getDashboard()
    {
        $subscriptions = Suscription::where('user_id', auth()->id())
        ->with('service') // esto es posible pq hay un belongsTo en el Models/Suscription 
        ->get();

        return view('users.dashboard', compact('subscriptions'));
    }
    public function registerUser(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:users',
                'name' => 'required|string',
                'password' => 'required|string|min:6',
                'role_id' => 'nullable'
            ]);

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->role_id = $request->input('role_id', 2); // el role_id de la request o valor predeterminado '2' : user
            $user->save();

            return redirect()->route('login')->with('success', 'Usuario creado correctamente, inicia sesion');

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

            return back()->withErrors($customErrorMessages)->withInput();

        } catch (QueryException $e) {
            return back()->withErrors(['error' => 'Ocurrió un error inesperado.'])->withInput();
        }
    }
    public function loginUser(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            // nota -> auth es un 'facade' que ya provee laravel :) 
            // automaticamente si la autenticacion es exitosa guarda el user en una variable session '$user'
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->intended(route('dashboard'));
            }

            return back()->withErrors(['credentials' => 'Las credenciales son incorrectas.'])->withInput();

        } catch (ValidationException $e) {
            $errorMessages = $e->validator->errors();
            $customErrorMessages = [];

            if ($errorMessages->has('email')) {
                $customErrorMessages['email'] = 'Por favor, ingresa un correo electrónico válido.';
            }

            if ($errorMessages->has('password')) {
                $customErrorMessages['password'] = 'La contraseña es obligatoria.';
            }

            return back()->withErrors($customErrorMessages)->withInput();

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ocurrió un error inesperado.'])->withInput();
        }
    }
    
    public function addSuscription(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $subscription = new Suscription();
            $subscription->user_id = auth()->id();
            $subscription->service_id = $request->input('service_id');
            $subscription->contract_date = now();
            $subscription->save();

            return redirect()->route('dashboard')->with('success', 'Suscripción añadida correctamente');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al agregar la suscripción: ' . $e->getMessage()])->withInput();
        }
    }
    public function unsubscribe($service_id)
    {
        $subscription = Suscription::where('user_id', auth()->id())
            ->where('service_id', $service_id)
            ->first();

        if ($subscription) {
            $subscription->delete();
            return redirect()->route('dashboard')->with('success', 'Te has desuscrito correctamente.');
        }

        return redirect()->route('dashboard')->withErrors(['error' => 'No estás suscrito a este servicio.']);
    }
    public function deleteUser($user_id)
    {
        $user = User::find($user_id);

        if ($user) {
            $user->delete();
            return redirect()->route('users')->with('success', 'Usuario eliminado con éxito.');
        }

        return redirect()->route('users')->with('error', 'Usuario no encontrado.');
    }
}

