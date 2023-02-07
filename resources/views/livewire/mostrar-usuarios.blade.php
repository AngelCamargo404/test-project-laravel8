<div>

    <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">

        @if(count($users) > 0)

        <h3 class="p-4 text-gray-600 font-bold text-xl">Todos los Usuarios</h3>
        
            @foreach ($users as $user)
                <div class="p-6 text-gray-900 md:flex md:justify-between md:items-center">
                    
                        <p class="text-sm text-gray-600 font-bold">Name: {{ $user->name }}</p>
                        <p class="text-sm text-gray-600 font-bold">Email: {{ $user->email }}</p>
                        <p class="text-sm text-gray-600 font-bold">Creación de la cuenta: {{ $user->created_at->format('d/m/Y')}}</p>
                        <p class="text-sm text-gray-600 font-bold">Rol: {{ $user->rol }}</p>
                </div>
                
            @endforeach

    </div>

    <div class="mt-10">
        {{ $users->links() }}
    </div>

    @else
        <p class="p-3 text-center text-sm text-gray-600">No hay usuarios para mostrar</p>
    @endif
        
</div>