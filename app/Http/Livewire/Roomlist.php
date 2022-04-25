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
            'rooms' => Room::with("RoomType")->where('no_room', 'LIKE', "%{$this->no_room}%")->paginate(10)
        ]);
    }
}
