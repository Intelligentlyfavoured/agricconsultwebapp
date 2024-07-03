<div>
    
    @if(session('success'))
        <div class="fixed inset-x-0 top-0 flex items-end justify-right px-4 py-6 justify-end">
                <div
                    class="max-w-sm w-full shadow-lg rounded px-4 py-3 rounded relative bg-amber-400 border-l-4 border-amber-700 text-white" id="successToast">
                    <div class="p-2">
                        <div class="flex items-start">
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm leading-5 font-medium">
                                {{ session('success') }}
                                </p>
                            </div>
                            <div class="ml-4 flex-shrink-0 flex">
                                <button class="inline-flex text-white transition ease-in-out duration-150"
                                onclick="document.getElementById('successToast').remove()"
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
        <script>
            setTimeout(function() {
                var successToast = document.getElementById('successToast');
                if (successToast) {
                    successToast.remove();
                }
            }, 5000); // 5000 milliseconds = 5 seconds
        </script>
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
            <x-button label="Messages" icon="o-envelope" link="###" class="btn-ghost btn-sm" responsive />
            <x-button label="Notifications" icon="o-bell" link="###" class="btn-ghost btn-sm" responsive />
            <x-button label="Profile" icon="o-user" link="/consultant/profile" class="btn-ghost btn-sm" responsive />
            <x-button label="Logout" icon="o-power" link="/logout" class="btn-ghost btn-sm" responsive />
        </x-slot:actions>
    </x-nav>

    <x-main>
        <x-slot:sidebar>
        <x-menu activate-by-route>
                <x-menu-item title="Home" icon="o-home" link="/consultant/home" />
                <x-menu-item title="Scheduling and Approving" icon="o-check-circle" link="/consultant/scheduling" />
            </x-menu>
        </x-slot:sidebar>
        <x-slot:content>
            
<div>

    @php
        // Assuming you're using Laravel's authentication and the authenticated user is a consultant
        // Fetch recommendations for the current consultant
        $currentConsultantId = auth()->user()->id; // Adjust based on your authentication mechanism
        $recommendations = \App\Models\Recommendation::with('consultant')
                        ->where('consultant_id', $currentConsultantId)
                        ->get();

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

            <!-- Modal for setting time, only rendered if isModalOpen is true -->
            @if($isModalOpen)
            <x-modal name="set-time-modal">
                <x-form wire:submit.prevent="setScheduleTime">
                    <x-datetime label="My date" wire:model="date" icon="o-calendar" />
                    <!-- Time picker input -->
                    <x-datetime label="Time" wire:model="myDate" icon="o-calendar" type="time" />
                    <x-slot:actions>
                        <x-button label="Set Time" type="submit" class="btn btn-primary" />
                    </x-slot:actions>
                </x-form>
            </x-modal>
            @endif
        </div>
        </x-slot:content>
    </x-main>

</div>
