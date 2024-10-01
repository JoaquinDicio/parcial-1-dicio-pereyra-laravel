<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicesController extends Controller
{
    public function postNewService(Request $request){
        
        //valida la entrada y manda mensajes personalizados de error
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:1',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede tener mas de 255 caracteres.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'price.min' => 'El precio no puede ser menor que 1',
        ]);

        //si todo lo anterior se valido correctamente pasamos aca
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

    public function editService(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $service = Service::findOrFail($id);
        $service->name = $request->input('name');
        $service->description = $request->input('description');
        $service->price = $request->input('price');
        $service->save();

        return redirect()->route('services')->with('success', 'Servicio actualizado con éxito.');
    }
}
