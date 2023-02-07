<div>

    <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">

        @if (auth()->user()->rol === 'admin')

            <div class="md:px-6 py-4 text-center md:text-start border-b border-dashed flex gap-4 justify-center md:justify-start">
                <h1 class="text-2xl font-bold">Crear Nuevo Producto</h1>
                <a class="font-bold px-2 text-2xl text-indigo-600 border rounded-full bg-gray-50 border-black" href="{{ route('products.create') }}">+</a>
            </div>

        @endif

        @if(count($productos) > 0)
        
            @foreach ($productos as $producto)
                <div class="p-6 text-gray-900 md:flex md:justify-between md:items-center">
                    
                        <p class="text-sm text-gray-600 font-bold">{{ $producto->nombre }}</p>
                        <p class="text-sm text-gray-600 font-bold">${{ $producto->precio }}</p>
                        <p class="text-sm text-gray-600 font-bold">{{ $producto->impuesto}}</p>

                        @if (auth()->user()->rol === 'cliente')

                            <form action="{{ route('payment') }}" method="POST">
                                @csrf

                                <input type="hidden" name="amount" value="{{ $producto->precio }}">
                                <input type="hidden" name="impuesto" value="{{ $producto->impuesto }}">
                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">

                                @auth
                                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-800 transition-all duration-200 p-3 mb-4 text-sm font-bold text-white rounded-lg text-center flex justify-center items-center gap-2 w-full" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>                                  
                                        Comprar
                                    </button>
                                @endauth
                                
                            </form>

                        @endif

                        @if (auth()->user()->rol === 'admin')

                            <div class="flex flex-col items-stretch gap-3 mt-5 md:mt-0">
                                <a href="{{ route('products.edit', $producto->id)}}" class="text-center bg-blue-800 py-2 px-4 rounded-lg text-white teext-xs font-bold uppercase active:scale-95 transition">
                                    Editar
                                </a>

                                <button wire:click="$emit('mostrarAlerta', {{$producto->id}})" class="text-center bg-red-800 py-2 px-4 rounded-lg text-white teext-xs font-bold uppercase active:scale-95 transition">
                                    Eliminar
                                </button>

                            </div>

                        @endif

                </div>
                
            @endforeach

    </div>

    <div class="mt-10">
        {{ $productos->links() }}
    </div>

    @else
        <p class="p-3 text-center text-sm text-gray-600">No hay productos para mostrar</p>
    @endif
        
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script> 

        Livewire.on('mostrarAlerta', productId => {
            Swal.fire({
                title: '¿Eliminar Producto?',
                text: "Un Producto Eliminado, no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si ¡Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    // Eliminar la vacante
                    Livewire.emit('eliminarProducto', productId);

                    Swal.fire(
                    'Se eliminó el producto',
                    'Eliminado Correctamente',
                    'success'
                    )
                }
            })
        });
    </script>
@endpush