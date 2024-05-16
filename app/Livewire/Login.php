<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

// use Livewire\Component;
// use Livewire\Attributes\Rule;
// use Livewire\Attributes\Layout;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Validation\ValidationException;

#[Layout('layouts.app')]
class Login extends Component
{
    #[Rule('required', 'email')]
    public string $email;
    #[Rule('required')]
    public string $password;
    public function login()
    {
        dd('login    ' . $this->email . ' ' . $this->password);
        // $this->validate();
        // cara-1
        // if (Auth::attemp([
        //     'email' => $this->email,
        //     'password' => $this->password])) {
        //     return redirect()->route('home');
        // }
        // cara-2
        //  if(Auth::attemp($this->only('email', 'password'))){
        //     return redirect()->route('home');
        // }
        // cara-3
        //  if(Auth::attempt($this->validate())){
        //     // return redirect()->route('home');
        //     return "ok";
        // }

        // throw ValidationException::withMessages([
        //     'email' => 'The provided credentials are incorrect.',
        // ]);

    }
    public function render()
    {
        return view('livewire.login');
    }
}
