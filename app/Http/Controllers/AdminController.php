<?php


namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use App\Models\News;
use App\Services\DashboardService;
class AdminController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function showDashboard()
    {
        $data = $this->dashboardService->getDashboardData();

        return view('admin.dashboard', $data);
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
