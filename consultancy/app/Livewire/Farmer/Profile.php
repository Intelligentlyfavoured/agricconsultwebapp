<?php

namespace App\Livewire\Farmer;

use Livewire\Component;
use App\Models\Farmer;
use Mary\Traits\Toast;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use Toast, WithFileUploads;

    public $name, $email, $phone, $address, $city, $avatar;

    public function mount()
    {
        $farmer = Farmer::find(auth()->user()->id);
        $this->name = $farmer->name;
        $this->email = $farmer->email;
        $this->phone = $farmer->phone;
        $this->address = $farmer->address;
        $this->city = $farmer->city;
        $this->avatar = $farmer->avatar;
    }

    public function uploadPhoto()
    {
        $this->validate([
            'avatar' => 'image|max:1024',
        ]);

        $farmer = Farmer::find(auth()->user()->id);
        $farmer->update([
            'avatar' => $this->avatar->store('avatars', 'public'),
        ]);

        $this->success('Photo uploaded successfully!');
    }
    public function render()
    {
        return view('livewire.farmer.profile');
    }
}
