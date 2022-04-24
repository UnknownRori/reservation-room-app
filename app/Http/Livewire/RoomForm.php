<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithFileUploads;

class RoomForm extends Component
{
    use WithFileUploads;
    public $room_id, $no_room, $type, $img, $update;

    protected $rules = [
        'no_room' => ['required', 'string', 'unique:rooms,no_room'],
        'type' => ['required', 'in:superior,deluxe'],
        'img' => ['required', 'image'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($room_id = null)
    {
        if (!is_null($room_id)) {
            $room = Room::findorFail($room_id);
            $this->room_id = $room->id;
            $this->no_room = $room->no_room;
            $this->type = $room->type;
            $this->update = true;
        }
    }

    public function update()
    {
        $property = $this->validate();
        if ($this->update) {
            $room = Room::findorFail($this->room_id);
            $room->fill($property);
            if ($room->save()) {
                session()->flash('msg', ['success', 'Room update success']);
                return redirect()->route('admin.rooms.index');
            } else {
                session()->flash('message', ['danger', 'Room update failed!']);
            }
        } else {
            if (Room::create($property)) {
                session()->flash('msg', ['success', 'Room creation success']);
                return redirect()->route('admin.rooms.index');
            } else {
                session()->flash('message', ['danger', 'Room creation failed!']);
            }
        }
    }

    public function render()
    {
        return view('livewire.room-form');
    }
}
