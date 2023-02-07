<form class="card" wire:submit.prevent="crearProducto">
    <div class="card-header pb-0">
        <div class="card-title font-bold">CREAR NUEVO PRODUCTO</div>
    </div>

    <div class="card-body">

        <div class="row mb-4">
            <label for="nombre" class="col-md-3 form-label">Nombre del Producto:</label>
            <div class="col-md-9">
                <input id="nombre" wire:model="nombre" :value="old('nombre')" type="text" class="form-control" placeholder="Nombre del Producto">

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
                <input type="number" wire:model="impuesto" step=".01" :value="old('impuesto')" class="form-control" placeholder="00.00">

                <x-input-error :messages="$errors->get('impuesto')" class="mt-2" />
            </div>
        </div>
    </div>
    <div class="card-footer">
        <!--Row-->
        <div class="row">
            <div class="col-lg-12 text-center md:text-right md:px-12">
                <x-primary-button>
                    {{ __('Crear Producto') }}
                </x-primary-button>
            
            </div>
        </div>
        <!--End Row-->
    </div>
</form>