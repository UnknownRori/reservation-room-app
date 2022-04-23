<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public $name, $password, $email;

    protected $rules = [
        'name' => ['string', 'min:4', 'unique:users,name'],
        'email' => ['email', 'unique:users,email'],
        'password' => ['string', 'min:4'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $credentials = $this->validate();
        if (!User::create($credentials)) return session()->flash('message', 'Something went wrong!');
        if (Auth::attempt($credentials)) return redirect()->route('home')->with('msg', ['success', 'Login success!']);
        session()->flash('message', 'Wrong Username or Password!');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
