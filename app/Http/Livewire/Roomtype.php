<?php

namespace App\Http\Livewire;

use App\Models\RoomType as ModelsRoomType;
use Livewire\Component;
use Livewire\WithPagination;

class Roomtype extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.roomtype', [
            'roomtype' => ModelsRoomType::paginate(4)
        ]);
    }
}
