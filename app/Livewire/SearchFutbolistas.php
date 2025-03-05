<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Futbolista;
use Livewire\Attributes\On;

class SearchFutbolistas extends Component
{
    public $search = '';

    public function render()
    {
        $futbolistas = Futbolista::where('nombre', 'like', '%' . $this->search . '%')->get();

        return view('livewire.search-futbolistas', [
            'futbolistas' => $futbolistas,
        ]);
    }
}
