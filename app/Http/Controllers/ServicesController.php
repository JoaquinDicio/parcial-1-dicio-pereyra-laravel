<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicesController extends Controller
{
    public function postNewService(Request $request){
        $service = new Service();

        $service->name = $request->input('name');
        $service->description = $request->input('description');
        $service->price = $request->input('price');
        
        $service->save();
        return redirect()->route('services')->with('success', 'Servicio agregado');
    }

    public function deleteService($id){
         $service = Service::find($id);

         if ($service) {
             $service->delete();
             return redirect()->route('services')->with('success', 'Servicio eliminado');
         }
         // por si no existe el service
         return redirect()->route('services.index')->with('error', 'Servicio no encontrado.');
    }
}
