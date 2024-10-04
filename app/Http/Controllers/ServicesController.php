<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Suscription;

class ServicesController extends Controller
{
    public function postNewService(Request $request)
    {

        //valida la entrada y manda mensajes personalizados de error
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|between:0.01,99999999.99',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede tener mas de 255 caracteres.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'price.between' => 'El precio debe estar entre 0 y 99999999',
        ]);

        //si todo lo anterior se valido correctamente pasamos aca
        $service = new Service();
        $service->name = $request->input('name');
        $service->description = $request->input('description');
        $service->price = $request->input('price');

        $service->save();
        return redirect()->route(route: 'admin.services')->with('success', 'Servicio agregado');
    }

    public function deleteService($id)
    {
        $service = Service::find($id);

        if ($service) {
            $hasSubscription = Suscription::where('service_id', $service->id)
                ->exists();

            if ($hasSubscription) {
                return redirect()->route('services')->with('error', 'No puedes eliminar este servicio porque existe una suscripción activa.');
            }

            $service->delete();
            return redirect()->route('services')->with('success', 'Servicio eliminado.');
        }

        return redirect()->route('services.index')->with('error', 'Servicio no encontrado.');
    }


    public function editService(Request $request, $id)
    {
        //valida la entrada y manda mensajes personalizados de error
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|between:0.01,99999999.99',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede tener mas de 255 caracteres.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'price.between' => 'El precio debe estar entre 0 y 99999999',
        ]);

        $service = Service::findOrFail($id);
        $service->name = $request->input('name');
        $service->description = $request->input('description');
        $service->price = $request->input('price');
        $service->save();

        return redirect()->route('admin.services')->with('success', 'Servicio actualizado con éxito.');
    }
}
