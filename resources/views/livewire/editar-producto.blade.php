<form class="card" wire:submit.prevent="editarProducto">
    <div class="card-body">

        @if (session()->has('mensaje'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
                <div id="alert" class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold
                p-2 my-3">
                    {{ session('mensaje') }}
                </div>
            </div>
        @endif

        <div class="row mb-4">
            <label for="nombre" class="col-md-3 form-label">Nombre del Curso:</label>
            <div class="col-md-9">
                <input id="nombre" wire:model="nombre" :value="old('nombre')" type="text" class="form-control" placeholder="Nombre del curso">

                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    
            </div>
        </div>
        <div class="row mb-4">
            <label for="precio" class="col-md-3 form-label">Precio:</label>
            <div class="col-md-9">
                <input type="number" wire:model="precio" step=".01" :value="old('precio')" class="form-control" placeholder="$000.00">

                <x-input-error :messages="$errors->get('precio')" class="mt-2" />
            </div>
        </div>
        <div class="row mb-4">
            <label for="impuesto" class="col-md-3 form-label">Impuesto:</label>
            <div class="col-md-9">
                <input type="number" wire:model="impuesto" step=".01" :value="old('impuesto')" class="form-control" placeholder="$000.00">

                <x-input-error :messages="$errors->get('impuesto')" class="mt-2" />
            </div>
        </div>
    </div>
    <div class="card-footer">
        <!--Row-->
        <div class="row">
            <div class="col-lg-12 text-center md:text-right md:px-12">
                <x-primary-button>
                    {{ __('Editar Curso') }}
                </x-primary-button>
            
            </div>
        </div>
        <!--End Row-->
    </div>
</form>