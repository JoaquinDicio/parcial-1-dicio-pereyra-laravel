<?php

namespace App\Services;

use App\Models\Suscription;
use App\Models\Service;
use App\Models\Payment;
use Carbon\Carbon;

class DashboardService
{
    public function getDashboardData(): array
    {
        $subscriptionsCount = Suscription::select('service_id', \DB::raw('count(*) as count'))
            ->groupBy('service_id')
            ->orderByDesc('count')
            ->get();

        $mostSubscribedService = $subscriptionsCount->first();
        $mostSubscribedServiceName = $mostSubscribedService ? Service::find($mostSubscribedService->service_id)->name : null;

        $services = Service::whereIn('id', $subscriptionsCount->pluck('service_id'))->get();

        $billingByMonth = Payment::select(
            \DB::raw('MONTH(payment_date) as month'),
            \DB::raw('SUM(amount) as total_amount')
        )
        ->whereYear('payment_date', Carbon::now()->year)
        ->groupBy(\DB::raw('MONTH(payment_date)'))
        ->orderBy('month')
        ->get();

        $billingData = $billingByMonth->map(function ($billing) {
            Carbon::setLocale('es'); 
            return [
                'month' => Carbon::create()->month($billing->month)->locale('es')->format('F'),
                'total' => $billing->total_amount
            ];
        });
        

        $totalBillingAmount = $billingByMonth->sum('total_amount');

        return [
            'subscriptionsCount' => $subscriptionsCount,
            'services' => $services,
            'mostSubscribedServiceName' => $mostSubscribedServiceName,
            'billingData' => $billingData,
            'totalBillingAmount' => $totalBillingAmount
        ];
    }
}
