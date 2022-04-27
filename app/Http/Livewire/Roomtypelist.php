<?php

namespace App\Http\Livewire;

use App\Models\RoomType;
use Livewire\Component;
use Livewire\WithPagination;

class Roomtypelist extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $withCount = ["Room as room_used" => function ($query) {
            $query->where('used', True);
        }];

        $room = RoomType::withCount($withCount)->withCount("RoomFacility")->withCount('Room')->where('name', 'LIKE', "%{$this->search}%")->paginate(10);
        return view('livewire.roomtypelist', [
            'types' => $room
        ]);
    }
}
