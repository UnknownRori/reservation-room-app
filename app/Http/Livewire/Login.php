<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $name, $password;

    protected $rules = [
        'name' => ['string', 'min:4'],
        'password' => ['string', 'min:4'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $credentials = $this->validate();
        if (Auth::attempt($credentials)) return redirect()->route('home')->with('msg', ['success', 'Login success!']);
        session()->flash('message', 'Wrong Username or Password!');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
