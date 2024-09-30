<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function showDashboard()
    {
        return view('admin.dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }
    public function getUsers(Request $request)
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    public function showUserInfo($id)
    {
        $user = User::findOrFail($id);
        $subscriptions = $user->subscriptions()->with('service')->get();

        return view('admin.userInfo', compact('user', 'subscriptions'));
    }
}
