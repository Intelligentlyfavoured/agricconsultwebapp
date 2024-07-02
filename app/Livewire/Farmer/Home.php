<?php
namespace App\Livewire\Farmer;

use Livewire\Component;
use App\Models\Consultant;
use Illuminate\Database\Eloquent\Collection;

class Home extends Component
{
    public $consultants;
    public bool $showNotificationsModal = false;
    public bool $showConsultantModal = false;
    public $search = ''; // Add a search property
    public ?Consultant $selectedConsultant = null;

    public $avatar, $name, $email, $phone, $address, $city, $specialization, $experience;

    public function mount()
    {
        // Initially, you don't need to load consultants here if you're loading them in render()
        $this->consultants = new Collection();
    }

    public function viewConsultant($consultantId)
    {
        // dd($consultantId);
        $this->showConsultantModal = true;

        $consultant = Consultant::find($consultantId);

        $this->name = $consultant->name;
        $this->email = $consultant->email;
        $this->phone = $consultant->phone;
        $this->address = $consultant->address;
        $this->city = $consultant->city;
        $this->specialization = $consultant->specialization;
        $this->experience = $consultant->experience;

    }

    public function hideConsultantModal()
    {
        $this->showConsultantModal = false;

        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
        $this->city = '';
        $this->specialization = '';
        $this->experience = '';
    }

    public function openNotificationsModal()
    {
        $this->showNotificationsModal = true;
    }

    public function hideNotificationsModal()
    {
        $this->showNotificationsModal = false;
    }

    public function render()
    {
        $query = Consultant::query();

        if (!empty($this->search)) {
            $query->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('specialization', 'like', '%' . $this->search . '%');
            });
        }

        $this->consultants = $query->get();

        return view('livewire.farmer.home', [
            'consultants' => $this->consultants
        ]);
    }
}