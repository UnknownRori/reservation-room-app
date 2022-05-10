<?php

namespace App\Http\Livewire;

use App\Models\HotelFacility as ModelsHotelFacility;
use Livewire\Component;
use Livewire\WithPagination;

class Hotelfacility extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.hotelfacility', [
            'facility' => ModelsHotelFacility::paginate(10)
        ]);
    }
}
