<?php


namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use App\Models\News;
use App\Models\Suscription;

class AdminController extends Controller
{
    public function showDashboard()
{
    $subscriptionsCount = Suscription::select('service_id', DB::raw('count(*) as count'))
        ->groupBy('service_id')
        ->orderByDesc('count')
        ->get();

    $mostSubscribedService = $subscriptionsCount->first();  // El más suscrito

    $mostSubscribedServiceName = null;
    if ($mostSubscribedService) {
        $mostSubscribedServiceName = Service::find($mostSubscribedService->service_id)->name;
    }

    $services = Service::whereIn('id', $subscriptionsCount->pluck('service_id'))->get();

    return view('admin.dashboard', compact('subscriptionsCount', 'services', 'mostSubscribedServiceName'));
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
        $user = User::findOrFail($id);
        $subscriptions = $user->subscriptions()->with('service', 'payments')->get();    
        return view('admin.userInfo', compact('user', 'subscriptions'));
    }
}
