<?php

namespace App\Livewire\Farmer;

use Livewire\Component;
use App\Models\Consultant;
use Mary\Traits\Toast;
use App\Models\Recommendation;

class Matchmaking extends Component
{
    use Toast;

    public $consultants;
    public bool $matchmakingModal1 = false;
    public bool $matchmakingModal2 = false;
    public bool $matchmakingModal3 = false;

    public $name, $email, $phone, $address, $city, $specialization, $experience;

    public $preferences;

    public function startMatchmaking()
    {
        $this->matchmakingModal1 = true;
    }
    public function agreeToTerms()
    {
        $this->matchmakingModal1 = false;
        $this->matchmakingModal2 = true;
    }

    public function scheduleConsultation($recommendationId)
    {
        $recommendation = Recommendation::find($recommendationId);
        $consultant = $recommendation->consultant;
        $farmer = auth()->user();

        // Create a schedule
        $farmer->schedules()->create([
            'consultants_id' => $consultant->id,
            'date' => now()->addDays(7), // Schedule for a week from now
        ]);

        // Provide feedback to the user
        $this->success('Consultation scheduled successfully!');

        // Optionally, move to the next step in the matchmaking process
        $this->matchmakingModal2 = false;
        $this->matchmakingModal3 = true; // If there's a next step/modal
    }

    public function savePreferences()
    {
        // Optionally validate preferences
        $this->validate([
            'preferences' => 'required|string', // Example validation
        ]);
    
        // Logic to find consultants based on preferences
        $matchingConsultants = Consultant::where('specialization', 'like', '%' . $this->preferences . '%')
                                         ->orWhere('description', 'like', '%' . $this->preferences . '%')
                                         ->get();
    
        // Assuming you want to display these recommendations immediately
        // You could also store them in the database if needed
        $this->consultants = $matchingConsultants;
    
        // Save the recommendations
        $farmerId = auth()->id(); // Get the current farmer's ID
        foreach ($matchingConsultants as $consultant) {
            Recommendation::create([
                'farmer_id' => $farmerId,
                'consultant_id' => $consultant->id,
            ]);
        }
    
        // Provide feedback to the user
        $this->success('Preferences saved successfully! Recommendations updated.');
    
        // Optionally, move to the next step in the matchmaking process
        $this->matchmakingModal2 = false;
        $this->matchmakingModal3 = true; // If there's a next step/modal
    }

    public function closeMatchmakingModal()
    {
        $this->matchmakingModal1 = false;
        $this->matchmakingModal2 = false;
        $this->matchmakingModal3 = false;
    }
    public function render()
    {
        return view('livewire.farmer.matchmaking');
    }
}
