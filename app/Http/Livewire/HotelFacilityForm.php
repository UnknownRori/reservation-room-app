<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Hotelfacilityform extends Component
{
    public $facility_id, $name, $description, $img, $update;

    public function render()
    {
        return view('livewire.hotelfacilityform');
    }
}
