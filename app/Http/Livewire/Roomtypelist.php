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
        return view('livewire.roomtypelist', [
            'types' => RoomType::withCount('Room')->where('name', 'LIKE', "%{$this->search}%")->paginate(10)
        ]);
    }
}
