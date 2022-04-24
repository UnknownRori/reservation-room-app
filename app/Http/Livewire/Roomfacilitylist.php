<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\RoomFacility;
use Livewire\Component;

class Roomfacilitylist extends Component
{

    public $name = "";

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.roomfacilitylist', [
            'facility' => RoomFacility::where('name', 'LIKE', "%{$this->name}%")->paginate(10)
        ]);
    }
}
