<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class Roomlist extends Component
{
    use WithPagination;

    public $room_type = "";
    public $no_room = "";

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.roomlist', [
            'rooms' => Room::where('no_room', 'LIKE', "%{$this->no_room}%")->where('type', 'LIKE', "%{$this->room_type}%")->paginate(10)
        ]);
    }
}
