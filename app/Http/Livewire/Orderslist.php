<?php

namespace App\Http\Livewire;

use App\Models\Orders;
use Livewire\Component;
use Livewire\WithPagination;

class Orderslist extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.orderslist', [
            'orders' => Orders::latest()->paginate(10)
        ]);
    }
}
