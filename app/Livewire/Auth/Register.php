<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    protected $rules = [
        'name' => ['required', 'string', 'min:5', 'max:25'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'min:8', 'confirmed']
    ];

    public function register(){
        $user = $this->validate();

        $user['is_admin'] = 0;


        $registered = User::create($user);

        Auth::login($registered);

        toastr()->success('You are successfully regisered!!');

        $this->redirectRoute('home');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
