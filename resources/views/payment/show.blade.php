<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Información de la Factura') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session()->has('mensaje'))
                <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">
                    {{ session('mensaje') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

                <div>
                    <div class="md:col-span-2 order-2 md:order-1">

                        <h4 class="font-bold text-center md:text-start uppercase">Pago hecho por: {{ $payment->payer_email }}</h4>
                        <div class="md:flex flex-col mt-4">
                            <p class="text-sm text-center md:text-start">Fecha: {{ $payment->created_at->format('d/m/Y') }}</p>
                            <p class="text-sm text-center md:text-start">ID del usuario que pagó: <span class="font-bold text-blue-700">{{ $payment->payer_id }}</span></p>
                            <p class="text-sm text-center md:text-start">Fecha de la ultima actualización de la factura: {{ $payment->created_at->format('d/m/Y') }}</p>
                            <p class="text-sm text-center md:text-start">Total del pago: <span class="font-bold text-blue-700">{{ $payment->amount }}</span></p>
                            <p class="text-sm text-center md:text-start">Moneda del pago: <span class="font-bold text-blue-700">{{ $payment->currency }}</span></p>
                            @if ($payment->payment_status == 1)
                            <p class="text-sm text-center md:text-start">Estado del pago: <span class="font-bold text-blue-700">Completado</span></p>
                            @endif
                            @if ($payment->payment_status == 0)
                            <p class="text-sm text-center md:text-start">Estado del pago: <span class="font-bold text-blue-700">Pendiente</span></p>
                            @endif
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>