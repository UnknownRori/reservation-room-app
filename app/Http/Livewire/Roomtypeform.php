<?php

namespace App\Http\Livewire;

use App\Models\RoomType;
use Livewire\Component;
use Livewire\WithFileUploads;

class Roomtypeform extends Component
{
    use WithFileUploads;

    public $name, $img, $update;

    protected $rules = [
        'name' => ['required', 'string', 'unique:room_types,name'],
        'img' => ['required', 'image'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($type = null)
    {
        if (!is_null($type)) {
            $this->type_id = $type->id;
            $this->name = $type->name;
            $this->update = true;
        }
    }

    public function update()
    {
        $property = $this->validate();
        if ($this->update) {
            $room = RoomType::findorFail($this->type_id);
            $room->fill($property);
            if ($room->save()) {
                session()->flash('msg', ['success', 'Room type successfully updated!']);
                return redirect()->route('admin.roomtype.index');
            } else {
                session()->flash('message', ['danger', 'Room  Type failed to update!']);
            }
        } else {
            if (RoomType::create($property)) {
                session()->flash('msg', ['success', 'Room Type successfully created!']);
                return redirect()->route('admin.roomtype.index');
            } else {
                session()->flash('message', ['danger', 'Room type failed to create!']);
            }
        }
    }

    public function render()
    {
        return view('livewire.roomtypeform');
    }
}
