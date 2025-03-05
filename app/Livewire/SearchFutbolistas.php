<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Futbolista;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class SearchFutbolistas extends Component
{
    public $search = '';

    public function render()
    {
        // Filtrar los futbolistas según el nombre
        $futbolistas = Futbolista::where('nombre', 'like', '%' . $this->search . '%')
            ->where('id_usuario', Auth::id())
            ->get();

        return view('livewire.search-futbolistas', [
            'futbolistas' => $futbolistas,
        ]);
    }
}
