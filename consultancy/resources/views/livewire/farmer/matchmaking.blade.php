<div>
    @if(session('success'))
        <div class="fixed inset-x-0 top-0 flex items-end justify-right px-4 py-6 justify-end">
                <div
                    class="max-w-sm w-full shadow-lg rounded px-4 py-3 rounded relative bg-amber-400 border-l-4 border-amber-700 text-white">
                    <div class="p-2">
                        <div class="flex items-start">
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm leading-5 font-medium">
                                {{ session('success') }}
                                </p>
                            </div>
                            <div class="ml-4 flex-shrink-0 flex">
                                <button class="inline-flex text-white transition ease-in-out duration-150"
                                onclick="return this.parentNode.parentNode.parentNode.parentNode.remove()"
                                >
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif
    <x-nav sticky full-width>
        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
    
            {{-- Brand --}}
            <div>AGRIK-CONSULT</div>
        </x-slot:brand>
    
        {{-- Right side actions --}}
        <x-slot:actions>
            <x-theme-toggle darkTheme="dim" lightTheme="winter" />
            @if(auth()->check() && auth()->user()->role === 'user')
                <x-button label="Orders" icon="o-envelope" class="btn-ghost btn-sm" wire:click="viewOrders" responsive />
            @endif
            <x-button label="Notifications" wire:click="openNotificationsModal" icon="o-bell" class="btn-ghost btn-sm" responsive />
            @if(auth()->check())
                <x-button label="{{ auth()->user()->name }}" icon="o-user" link="/farmer/profile" class="btn-ghost btn-sm" responsive />
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <x-button label="Logout" icon="o-power" onclick="event.preventDefault(); this.closest('form').submit();" class="btn-ghost btn-sm" responsive />
                </form>
            @else
                <x-button label="Profile" icon="o-user" link="/login" class="btn-ghost btn-sm" responsive />
            @endif
        </x-slot:actions>
    </x-nav>

    <x-main>
        <x-slot:sidebar>
            <x-menu activate-by-route>
                <x-menu-item title="Home" icon="o-home" link="/farmer/home" />
                <x-menu-item title="Q & A" icon="o-chat-bubble-bottom-center-text" link="/farmer/qa" />
                <x-menu-item title="Matchmaking and Scheduling" icon="o-heart" link="/farmer/matchmaking" />
            </x-menu>
        </x-slot:sidebar>
        <x-slot:content>

            {{--header --}}
            <x-header title="Matchmaking and Scheduling here" subtitle="Press the button to start your machmaking process" separator progress-indicator />

            <x-button label="Start Matchmaking" icon="o-plus" class="btn-primary" wire:click="startMatchmaking" />


            @php
                // Fetch recommendations with consultant names
                $recommendations = \App\Models\Recommendation::with('consultant')->get();
            
                $headers = [
                    ['key' => 'id', 'label' => '#'],
                    ['key' => 'farmer_id', 'label' => 'Farmer Id'],
                    ['key' => 'consultant_name', 'label' => 'Consultant Name'], // Changed from consultant_id to consultant_name
                    ['key' => 'actions', 'label' => 'Actions'],
                ];
            @endphp
            
            <x-header title="Recommendations" with-anchor separator />
            <x-table :headers="$headers" :rows="$recommendations" striped>
                @foreach($recommendations as $recommendation)
                    @php
                        // Modify each recommendation row to include the consultant's name
                        $recommendation->consultant_name = $recommendation->consultant->name ?? 'N/A';
                    @endphp
                    @scope('actions', $recommendation)
                    <div class="flex">
                        <x-button icon="o-calendar-days" spinner class="btn-sm" wire:click="scheduleConsultation({{ $recommendation->id }})" />
                    </div>
                    @endscope
                @endforeach
            </x-table>


            
            @php
                // Fetch all schedules with consultant and farmer details
                $schedules = \App\Models\Schedule::with(['consultant', 'farmer'])->get();

                $headers = [
                    ['key' => 'id', 'label' => '#'],
                    ['key' => 'farmer_name', 'label' => 'Farmer Name'], // Assuming there's a relation to fetch farmer's name
                    ['key' => 'consultant_name', 'label' => 'Consultant Name'], // Assuming there's a relation to fetch consultant's name
                    ['key' => 'scheduled_date', 'label' => 'Scheduled Date'], // Assuming there's a date field
                    ['key' => 'actions', 'label' => 'Actions'],
                ];
            @endphp

            <x-header title="Scheduled Consultations" with-anchor separator />
            <x-table :headers="$headers" :rows="$schedules" striped>
                @foreach($schedules as $schedule)
                    @php
                        // Modify each schedule row to include the farmer's and consultant's name
                        $schedule->farmer_name = $schedule->farmer->name ?? 'N/A';
                        $schedule->consultant_name = $schedule->consultant->name ?? 'N/A';
                    @endphp
                    @scope('actions', $schedule)
                    <div class="flex">
                        <!-- Example action button to reschedule -->
                        <x-button icon="o-calendar-days" spinner class="btn-sm" wire:click="rescheduleConsultation({{ $schedule->id }})" />
                        <!-- Example action button to cancel -->
                        <x-button icon="o-sparkles" spinner class="btn-sm" wire:click="cancelConsultation({{ $schedule->id }})" />
                    </div>
                    @endscope
                @endforeach
            </x-table>

            <x-modal wire:model="matchmakingModal1" title="Terms and Conditions">
                  
                By clicking the "I Agree" button, you agree to the terms and conditions of the matchmaking process.
                <x-slot:actions>
                    <x-button label="I Agree" class="btn-primary" wire:click="agreeToTerms" />
                    <x-button label="Cancel" class="btn-ghost" wire:click="closeMatchmakingModal" />
                </x-slot:actions>
            </x-modal>

            <x-modal wire:model="matchmakingModal2" title="Matchmaking Process">
                
                    <div class="p-4">
                        <x-form wire:submit="savePreferences">
                            <x-input type="text" wire:model="preferences" label="Enter your preferences for your ideal consultant" />
                            <x-slot:actions>
                                <x-button label="Save Preferences" class="btn-primary" type="save" />
                            </x-slot:actions>
                        </x-form>
                    </div>
                
                <x-slot:actions>
                    <x-button label="Close" class="btn-primary" wire:click="closeMatchmakingModal" />
                </x-slot:actions>
            </x-modal>

            <x-modal wire:model="matchmakingmodal3" title="Matchmaking Results">
                <div class="p-4">
                    <p>Based on your preferences, we have found the following consultants for you:</p>
                    <ul>
                    @if($consultants)
                        @forelse($consultants as $consultant)
                            <!-- Your existing code to display each consultant -->
                        @empty
                            <li>No consultants found.</li>
                        @endforelse
                    @else
                        <li>No consultants found.</li>
                    @endif
                    </ul>
                </div>
                <x-slot:actions>
                    <x-button label="Close" class="btn-primary" wire:click="closeMatchmakingModal" />
                </x-slot:actions>
            </x-modal>
        </x-slot:content>
    </x-main>
</div>
