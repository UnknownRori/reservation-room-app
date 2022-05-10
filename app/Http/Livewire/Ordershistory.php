<?php

namespace App\Http\Livewire;

use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Ordershistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.ordershistory', [
            'orders' => Orders::where('users_id', Auth::user()->id)->paginate(10),
        ]);
    }
}
