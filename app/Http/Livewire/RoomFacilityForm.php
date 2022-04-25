<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\RoomFacility;
use Livewire\Component;
use Livewire\WithFileUploads;

class Roomfacilityform extends Component
{
    use WithFileUploads;
    public $roomfacility_id, $room_type_id, $name, $description, $img, $update;

    protected $rules = [
        'name' => ['required', 'string'],
        'room_type_id' => ['required', 'int'],
        'description' => ['required', 'string'],
        'img' => ['required', 'image'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($roomtype = null, $roomfacility = null)
    {
        if (!is_null($roomfacility)) {
            $this->roomfacility_id = $roomfacility->id;
            $this->room_id = $roomfacility->room_id;
            $this->name = $roomfacility->name;
            $this->description = $roomfacility->description;
            $this->update = true;
        }
        $this->roomtype = $roomtype;
    }

    public function update()
    {
        $property = $this->validate();
        if ($this->update) {
            $Facility = RoomFacility::findorFail($this->roomfacility_id);
            $Facility->fill($property);
            if ($Facility->save()) {
                session()->flash('msg', ['success', 'Room facility successfully updated!']);
                return redirect()->route('admin.room.facility.index');
            } else {
                session()->flash('message', ['danger', 'Room facility failed to update!']);
            }
        } else {
            $property['room_type_id'] = $this->room_type_id;
            if (RoomFacility::create($property)) {
                session()->flash('msg', ['success', 'Room facility successfully created!']);
                return redirect()->route('admin.room.facility.index');
            } else {
                session()->flash('message', ['danger', 'Room facility failed to create!']);
            }
        }
    }

    public function render()
    {
        return view('livewire.roomfacilityform');
    }
}
