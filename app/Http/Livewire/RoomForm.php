<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithFileUploads;

class RoomForm extends Component
{
    public $room_id, $no_room, $room_type_id, $update, $roomtype, $type_name;

    protected $rules = [
        'no_room' => ['required', 'string', 'unique:rooms,no_room'],
        'room_type_id' => ['required', 'integer'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($room = null, $roomtype)
    {
        if (!is_null($room)) {
            $this->room_id = $room->id;
            $this->no_room = $room->no_room;
            $this->room_type_id = $room->room_type_id;
            $this->type_name = $room->RoomType->name;
            $this->update = true;
        }
        $this->roomtype = $roomtype;
    }

    public function updatedType($key)
    {
        $this->type = $key;
        $this->type_name = $this->roomtype->find($key)->name;
    }

    public function update()
    {
        $property = $this->validate();
        if ($this->update) {
            $room = Room::findorFail($this->room_id);
            $room->fill($property);
            if ($room->save()) {
                session()->flash('msg', ['success', 'Room successfully updated!']);
                return redirect()->route('admin.rooms.index');
            } else {
                session()->flash('message', ['danger', 'Room failed to update!']);
            }
        } else {
            if (Room::create($property)) {
                session()->flash('msg', ['success', 'Room creation successfully!']);
                return redirect()->route('admin.rooms.index');
            } else {
                session()->flash('message', ['danger', 'Room failed to create!']);
            }
        }
    }

    public function render()
    {
        return view('livewire.room-form');
    }
}
