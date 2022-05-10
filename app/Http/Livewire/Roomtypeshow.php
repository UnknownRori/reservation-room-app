<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Roomtypeshow extends Component
{
    public $room;

    public function mount($room)
    {
        $this->room = $room;
    }

    public function render()
    {
        return view('livewire.roomtypeshow');
    }
}
