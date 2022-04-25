<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\RoomFacility;
use Livewire\Component;
use Livewire\WithPagination;

class Roomfacilitylist extends Component
{
    use WithPagination;
    public $name = "";

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.roomfacilitylist', [
            'facility' => RoomFacility::with('RoomType')->where('name', 'LIKE', "%{$this->name}%")->paginate(10)
        ]);
    }
}
