<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use App\Models\News;

class AdminController extends Controller
{
    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function addUserForm(){
        return view('admin.addUserForm');
    }

    public function showServices(){
        $services = Service::all();
        return view('admin.services', compact('services'));
    }

    public function showNews(){
        $news = News::all();
        return view('admin.news', compact('news'));
    }

    public function addNewsForm(){
        return view('admin.addNewsForm');
    }

    public function addServiceForm(){
        return view('admin.addServiceForm');
    }

    public function editServiceForm($id){
        $service = Service::findOrFail($id);
        return view('admin.editServiceForm', compact('service'));
    }

    public function editNewsForm($id){
        $news = News::findOrFail($id);
        return view('admin.editNewsForm', compact('news'));
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
