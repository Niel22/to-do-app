<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email, $password;

    protected $rules = [
        'email' => ['required'],
        'password' => ['required']
    ];

    public function login(){
        $user = $this->validate();

        if(Auth::attempt(['email'=> $user['email'], 'password' => $user['password']])){
            session()->regenerate();

            toastr()->success('Welcome Back!!');
            
            $this->redirectRoute('home');


        }else{
            $this->addError('email', 'Inavlid Email or Password');
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
