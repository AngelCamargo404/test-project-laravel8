<x-app-layout>
    <div class="payment-success pt-4">
        <div class="header">
        <i class="ion-close-round close"></i>
        </div>
        <div class="body">
        <h2 class="title">Pago realizado satisfactoriamente</h2>
        <div class="paypalImg">
            <img class="main-img" src="https://res.cloudinary.com/dw1zug8d6/image/upload/v1542777688/group-3_3x.png" alt="Imagen Logo Paypal">
        </div>
        <p>Tu pago fue realizado satisfactoriamente! <br>
    Disfruta de tu recorrido aprendiendo, en SmartSpace</p>
        <p>{{$message}}</p>
        <a class="bg-indigo-500 mb-8 hover:bg-indigo-800 transition-all duration-200 p-3 text-sm font-bold text-white rounded-lg text-center flex justify-center items-center gap-2 md:inline-block mt-4" href="{{ route('productos.index') }}">Ir a la pagina principal</a>    
        </div>
    </div>
</x-app-layout>