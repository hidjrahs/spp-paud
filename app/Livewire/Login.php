<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

// use Livewire\Component;
// use Livewire\Attributes\Rule;
// use Livewire\Attributes\Layout;
// use Illuminate\Support\Facades\Auth;
//
#[Layout('layouts.app')]
class Login extends Component
{
    #[Rule('required', 'email')]
    public string $email;
    #[Rule('required', 'min:4', 'max:12')]
    public string $password;
    public function login()
    {
        // dd('login    ' . $this->email . ' ' . $this->password);
        $validated = $this->validate([
            'email' => 'required|min:3',
            'password' => 'required|min:3',
        ]);
        // dd($validated);
        // dd($this->validate());
        // cara-1
        // if (User::guard('web')->attemp([
        //     'email' => $this->email,
        //     'password' => $this->password])) {
        //     return redirect()->route('dashboard');
        // }
        // cara-2
        // if (Auth::attemp($this->only('email', 'password'))) {
        //     return redirect()->route('dashboard');
        // }
        // cara-3

        if (Auth::attempt($this->validate())) {
            return redirect()->route('dashboard');
        }

        throw ValidationException::withMessages([
            'errors' => [trans('auth.failed')],
        ]);

    }
    public function render()
    {
        return view('livewire.login');
    }
}
