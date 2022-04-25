<?php

namespace App\Http\Livewire;

use App\Models\HotelFacility;
use Livewire\Component;
use Livewire\WithFileUploads;

class Hotelfacilityform extends Component
{
    use WithFileUploads;
    public $facility_id, $name, $description, $img, $update;

    public function mount($facility = null)
    {
        if (!is_null($facility)) {
            $this->facility_id = $facility->id;
            $this->name = $facility->name;
            $this->description = $facility->description;
            $this->update = true;
        }
    }

    public function update()
    {
        $property = $this->validate();
        if ($this->update) {
            $room = HotelFacility::findorFail($this->room_id);
            $room->fill($property);
            if ($room->save()) {
                session()->flash('msg', ['success', 'Room update success']);
                return redirect()->route('admin.rooms.index');
            } else {
                session()->flash('message', ['danger', 'Room update failed!']);
            }
        } else {
            if (HotelFacility::create($property)) {
                session()->flash('msg', ['success', 'Room creation success']);
                return redirect()->route('admin.rooms.index');
            } else {
                session()->flash('message', ['danger', 'Room creation failed!']);
            }
        }
    }

    public function render()
    {
        return view('livewire.hotelfacilityform');
    }
}
