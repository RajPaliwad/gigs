<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ];

    public function submit()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            return redirect()->route('listings.index');
        }

        $this->addError('email', 'The provided credentials do not match our records.');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
