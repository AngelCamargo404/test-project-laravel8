<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class CrearProducto extends Component
{

    public $nombre;
    public $precio;
    public $impuesto;

    protected $rules = [
        'nombre' => 'required|string',
        'precio' => 'required|numeric|min:0',
        'impuesto' => 'required|numeric|min:0',
    ];
    
    public function crearProducto()
    {

        $datos = $this->validate();

        Product::create([
            'nombre' => $datos['nombre'],
            'precio' => $datos['precio'],
            'impuesto' => $datos['impuesto'],
        ]);

        // Crear un mensaje
        session()->flash('mensaje', 'El curso se creó correctamente');

        // Redireccionar al usuario
        return redirect()->route('productos.index');
    }

    public function render()
    {
        return view('livewire.crear-producto');
    }
}
