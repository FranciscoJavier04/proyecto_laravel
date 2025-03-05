<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ConfirmDeleteModal extends Component
{
    public $id;
    public $route;
    public $message;

    public function __construct($id, $route, $message = "¿Estás seguro de que deseas eliminar este elemento?")
    {
        $this->id = $id;
        $this->route = $route;
        $this->message = $message;
    }

    public function render()
    {
        return view('components.confirm-delete-modal');
    }
}
