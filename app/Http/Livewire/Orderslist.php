<?php

namespace App\Http\Livewire;

use App\Models\Orders;
use App\Models\RoomType;
use Livewire\Component;
use Livewire\WithPagination;

class Orderslist extends Component
{
    use WithPagination;

    public $name = '';
    public $room_type = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search_user_name = $this->name;

        $closure = function ($query) use ($search_user_name) {
            $query->where('name', 'LIKE', "%{$search_user_name}%");
        };

        $orders = Orders::whereHas('User', $closure)->with('User')->with("RoomType")->where('room_type_id', 'LIKE', "%{$this->room_type}%")->latest()->paginate(10);

        return view('livewire.orderslist', [
            'orders' => $orders,
            'types' => RoomType::all()
        ]);
    }
}
