<?php

namespace App\Http\Livewire;

use App\Models\RoomType;
use Livewire\Component;

class OrdersForm extends Component
{
    public $check_in, $check_out, $total_room, $room_type_id;

    protected $rules = [
        'check_in' => ['required', 'date'],
        'check_out' => ['required', 'date'],
        'room_type_id' => ['required', 'numeric'],
        'total_room' => ['required', 'numeric'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
    }

    public function render()
    {
        return view('livewire.orders-form', [
            'type' => RoomType::all()
        ]);
    }
}
