<x-app-layout>
  <div class='error-wrapper' id='error-wrapper'>
    <div id='error-page'>
       <div id='error-inner'>
          <h3>Error</h3>
          <div class='box-404'>
             <div>PARE</div>
          </div>
          <h2>Error en la transacción</h2>
          <p class="pb-4">{{ $message }}<br/></p>
       </div>
       <a class="bg-indigo-500 mb-8 hover:bg-indigo-800 transition-all duration-200 p-3 text-sm font-bold text-white rounded-lg text-center flex justify-center items-center gap-2 md:inline-block" href="{{ route('productos.index') }}">Ir a la pagina principal</a>
    </div>
 </div>

</x-app-layout>