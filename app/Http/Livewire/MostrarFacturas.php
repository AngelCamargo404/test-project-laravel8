<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;

class MostrarFacturas extends Component
{
    public function render()
    {
        $facturasPendientes = Payment::where('payment_status', '=', 0)->latest()->get();
        $facturasCompletadas = Payment::where('payment_status', '=', 1)->latest()->get();

        return view('livewire.mostrar-facturas', [
            'facturasCompletadas' => $facturasCompletadas,
            'facturasPendientes' => $facturasPendientes
        ]);
    }
}
