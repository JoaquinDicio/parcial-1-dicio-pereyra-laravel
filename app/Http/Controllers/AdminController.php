<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;

class AdminController extends Controller
{
    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function showServices(){
        $services = Service::all();
        return view('admin.services', compact('services'));
    }

    public function addServiceForm($id){
        return view('admin.addServiceForm');
    }

    public function editServiceForm($id){
        $service = Service::findOrFail($id);
        return view('admin.editServiceForm', compact('service'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }

    public function getUsers(Request $request)
    {
        $users = User::all();
        //compact crea un array con las variables
        return view('admin.users', compact('users'));
    }

    public function showUserInfo($id)
    {
        $user = User::findOrFail($id); //hace lo que dice el nombre, o encuentra o falla xd
        $subscriptions = $user->subscriptions()->with('service')->get();

        return view('admin.userInfo', compact('user', 'subscriptions'));
    }
}
