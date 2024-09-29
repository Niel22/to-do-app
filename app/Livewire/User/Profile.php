<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $name, $email;

    protected $rules = [
        'name' => ['required', 'string'],
        'email' => ['required', 'email']
    ];

    public function mount(){
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function updateProfile($id){

        $user = Auth::user();

        $user->update([
            'name' => $this->validate()['name'],
            'email' => $this->validate()['email']
        ]);

        toastr()->success('Profile Updated Successfully');

    }

    public function render()
    {
        return view('livewire.user.profile');
    }
}
