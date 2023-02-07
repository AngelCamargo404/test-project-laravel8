<div>

    <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">


        @if(count($facturasPendientes) > 0)

        <div class="border-b-2 border-black">

            <h3 class="p-4 text-gray-600 font-bold text-xl">Facturas Pendientes</h3>

            @foreach ($facturasPendientes as $facturaPendiente)
                <div class="p-6 text-gray-900 md:flex md:justify-between md:items-center">
                    
                        <p class="text-sm text-gray-600 font-bold">Cliente ID: {{ $facturaPendiente->id }}</p>
                        <p class="text-sm text-gray-600 font-bold">Total Monto: ${{ $facturaPendiente->amount }}</p>
                        <p class="text-sm text-gray-600 font-bold">Fecha: {{ $facturaPendiente->created_at->format('d/m/Y') }}</p>

                        @if (auth()->user()->rol === 'admin')

                            <div class="flex flex-col items-stretch gap-3 mt-5 md:mt-0">
                                <a href="{{ route('payment.show', $facturaPendiente) }}" class="text-center bg-blue-800 py-2 px-4 rounded-lg text-white teext-xs font-bold uppercase active:scale-95 transition">
                                    Ver Detalles
                                </a>

                            </div>

                        @endif

                </div>
                
            @endforeach

        </div>

        @endif

        @if (count($facturasCompletadas) > 0)

            <h3 class="p-4 text-gray-600 font-bold text-xl">Facturas Completadas</h3>

            @foreach ($facturasCompletadas as $facturasCompletada)
                <div class="p-6 text-gray-900 md:flex md:justify-between md:items-center">
                    
                        <p class="text-sm text-gray-600 font-bold">Cliente ID: {{ $facturasCompletada->id }}</p>
                        <p class="text-sm text-gray-600 font-bold">Total Monto: ${{ $facturasCompletada->amount }}</p>
                        <p class="text-sm text-gray-600 font-bold">Fecha: {{ $facturasCompletada->created_at->format('d/m/Y') }}</p>

                        @if (auth()->user()->rol === 'admin')

                            <div class="flex flex-col items-stretch gap-3 mt-5 md:mt-0">
                                <a href="{{ route('payment.show', $facturasCompletada) }}" class="text-center bg-blue-800 py-2 px-4 rounded-lg text-white teext-xs font-bold uppercase active:scale-95 transition">
                                    Ver Detalles
                                </a>

                            </div>

                        @endif

                </div>
                
            @endforeach

            @endif

    </div>
        
</div>