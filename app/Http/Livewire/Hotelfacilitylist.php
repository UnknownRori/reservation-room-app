<?php

namespace App\Http\Livewire;

use App\Models\HotelFacility;
use Livewire\Component;
use Livewire\WithPagination;

class Hotelfacilitylist extends Component
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
        return view('livewire.hotelfacilitylist', [
            'facilities' => HotelFacility::orWhere('name', 'LIKE', "%{$this->search}%")->orwhere('id', 'LIKE', "%{$this->search}%")->paginate(10)
        ]);
    }
}
