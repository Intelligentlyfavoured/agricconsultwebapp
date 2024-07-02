<?php

namespace App\Livewire\Consultant;

use Livewire\Component;
use Mary\Traits\Toast;
use App\Models\Schedule;

class Scheduling extends Component
{
    use Toast;
    public $consultant;
    public $date, $time;

    public bool $isModalOpen = false;


    public function setScheduleTime($scheduleId, $date, $time)
    {
        // Validation (optional but recommended)
        $validatedData = $this->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i', // Assuming time is in 'hour:minute' format
        ]);
    
        // Combine date and time into a single datetime string
        $dateTime = $date . ' ' . $time;
    
        // Find the schedule by ID and update it
        $schedule = \App\Models\Schedule::find($scheduleId);
        if ($schedule) {
            $schedule->scheduled_date = $dateTime; // Assuming 'scheduled_date' is the column name
            $schedule->save();
    
            // Optionally, emit an event or flash a session message to indicate success
            $this->success('Schedule updated successfully.');
        } else {
            // Handle the case where the schedule doesn't exist
            $this->error('Schedule not found.');
        }
    }
    public function render()
    {
        return view('livewire.consultant.scheduling');
    }
}

