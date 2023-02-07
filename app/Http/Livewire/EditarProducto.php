<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class EditarProducto extends Component
{
    public $product_id;
    public $nombre;    
    public $precio;
    public $impuesto;

    protected $rules = [
        'nombre' => 'required|string',
        'precio' => 'required',
        'impuesto' => 'required',
    ];
    
    public function mount(Product $product)
    {
        $this->product_id = $product->id;
        $this->nombre = $product->nombre;
        $this->precio = $product->precio;
        $this->impuesto = $product->impuesto;
    }

    public function editarProducto()
    {
        $datos = $this->validate();

        // Encontrar el curso a editar
        $product = Product::find($this->product_id);

        // Asignar los valores
        $product->nombre = $datos['nombre'];
        $product->precio = $datos['precio'];
        $product->impuesto = $datos['impuesto'];

        // Guardar el curso
        $product->save();

        // Redireccionar
        session()->flash('mensaje', 'El producto se actualizó Correctamente');
        return redirect()->route('productos.index');
    }
    
    public function render()
    {
        return view('livewire.editar-producto');
    }
}
