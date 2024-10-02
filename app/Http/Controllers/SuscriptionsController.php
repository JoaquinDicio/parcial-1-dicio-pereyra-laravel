<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suscription;

class SuscriptionsController extends Controller {

        public function addSuscription(Request $request) {
        $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $subscription = new Suscription();
            $subscription->user_id = auth()->id();
            $subscription->service_id = $request->input('service_id');
            $subscription->contract_date = now();
            $subscription->save();

            return redirect()->route('users.dashboard')->with('success', 'Te suscribiste correctamente');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al agregar la suscripción: ' . $e->getMessage()])->withInput();
        }
    }

    public function unsubscribe($service_id) {
        $subscription = Suscription::where('user_id', auth()->id())
            ->where('service_id', $service_id)
            ->first();

        if ($subscription) {
            $subscription->delete();
            return back()->with('success', 'Te desuscribiste correctamente.');
        }
    }
}