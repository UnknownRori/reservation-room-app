<?php

namespace App\Http\Livewire;

use App\Models\HotelFacility;
use Livewire\Component;
use Livewire\WithFileUploads;

class Hotelfacilityform extends Component
{
    use WithFileUploads;
    public $facility_id, $name, $description, $img, $update;

    protected $rules = [
        'name' => ['required', 'string', 'unique:hotel_facilities,name'],
        'description' => ['required', 'string'],
        'img' => ['required', 'image'],
    ];

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
            $room = HotelFacility::findorFail($this->facility_id);
            $room->fill($property);
            if ($room->save()) {
                session()->flash('msg', ['success', 'Hotel facility successfully updated!']);
                return redirect()->route('admin.facility.index');
            } else {
                session()->flash('message', ['danger', 'Hotel facility failed to update!']);
            }
        } else {
            if (HotelFacility::create($property)) {
                session()->flash('msg', ['success', 'Hotel facility successfully created!']);
                return redirect()->route('admin.facility.index');
            } else {
                session()->flash('message', ['danger', 'Hotel facility failed to create!']);
            }
        }
    }

    public function render()
    {
        return view('livewire.hotelfacilityform');
    }
}
