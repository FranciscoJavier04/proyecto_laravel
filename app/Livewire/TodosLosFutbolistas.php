<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Futbolista;

class TodosLosFutbolistas extends Component
{
    public $search = ''; // Se define la propiedad para la búsqueda

    public function render()
    {
        $futbolistas = Futbolista::where('nombre', 'like', '%' . $this->search . '%')->get();

        return view('livewire.todos-los-futbolistas', [
            'futbolistas' => $futbolistas,
        ]);
    }
}
