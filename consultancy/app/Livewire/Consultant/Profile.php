<?php

namespace App\Livewire\Consultant;

use Livewire\Component;
use App\Models\Consultant;
use Mary\Traits\Toast;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use Toast, WithFileUploads;

    public $name, $email, $phone, $address, $city, $avatar;

    public function mount()
    {
        $consultant = Consultant::find(auth()->user()->id);
        $this->name = $consultant->name;
        $this->email = $consultant->email;
        $this->phone = $consultant->phone;
        $this->address = $consultant->address;
        $this->city = $consultant->city;
        $this->avatar = $consultant->avatar;
    }

    public function uploadPhoto()
    {
        $this->validate([
            'avatar' => 'image|max:1024', // 1MB Max
        ]);

        $consultant = Consultant::find(auth()->user()->id);
        $consultant->avatar = $this->avatar->store('avatars', 'public');
        $consultant->save();

        $this->avatar = $consultant->avatar;

        $this->success('Profile photo updated successfully!');
    }
    
    public function render()
    {
        return view('livewire.consultant.profile');
    }
}
