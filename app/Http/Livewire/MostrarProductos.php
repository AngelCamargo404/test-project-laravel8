<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class MostrarProductos extends Component
{

    protected $listeners = ['eliminarProducto'];

    public function eliminarProducto(Product $product)
    {

        $product->delete();
    }

    public function render()
    {

        $productos = Product::latest()->paginate(5);

        return view('livewire.mostrar-productos', [
            'productos' => $productos
        ]);
    }
}
