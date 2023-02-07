<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class MostrarUsuarios extends Component
{
    public function render()
    {

        $users = User::latest()->paginate(5);

        return view('livewire.mostrar-usuarios', [
            'users' => $users
        ]);
    }
}
