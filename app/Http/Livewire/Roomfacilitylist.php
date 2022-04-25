<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\RoomFacility;
use App\Models\RoomType;
use Livewire\Component;
use Livewire\WithPagination;

class Roomfacilitylist extends Component
{
    use WithPagination;
    public $name = "";
    public $type = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.roomfacilitylist', [
            'facility' => RoomFacility::with('RoomType')->where('name', 'LIKE', "%{$this->name}%")->where('room_type_id', 'LIKE', "%{$this->type}%")->paginate(10),
            'types' => RoomType::all()
        ]);
    }
}
