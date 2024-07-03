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
            <x-header title="Specialists at your disposal" separator progress-indicator>
                <x-slot:middle class="!justify-end">
                <x-mary-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" hint="Type to search" />
                </x-slot:middle>
            </x-header>

            <div>
                {{-- Other parts of your template --}}

                <div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                        @forelse($consultants as $consultant)
                            <x-card title="Experience: {{ $consultant->experience }}" class="cursor-pointer" shadow wire:click="viewConsultant({{ $consultant->id }})">
                                {{-- Uncomment if you want to display the consultant's avatar --}}
                                <x-slot:figure>
                                    @if($consultant->avatar)
                                        <img src="{{ asset('storage/' . $consultant->avatar) }}" alt="Consultant" class="w-full h-40 object-cover" />
                                    @else
                                        <img src="{{ asset('storage/avatar/empty-user.jpg') }}" alt="Consultant" class="w-full h-40 object-cover" />
                                    @endif
                                </x-slot:figure>
                                
                                <h3 class="text-lg font-semibold">{{ $consultant->name }}</h3>
                                <p class="text-sm text-gray-600">{{ $consultant->specialization }}</p>
                                <x-slot:menu class="flex">
                                    <x-button icon="o-heart" class="btn btn-circle btn-sm"/>
                                    <x-button icon="o-sparkles" class="btn btn-circle btn-sm"/>
                                </x-slot:menu>
                            </x-card>
                        @empty
                            <x-card>
                                <x-slot:body>
                                    <p class="text-center">No consultants found</p>
                                </x-slot:body>
                            </x-card>
                        @endforelse
                    </div>
                </div>

                {{-- Other parts of your template --}}
            </div>


            {{-- Notification Modal --}}
            <x-modal wire:model="showNotificationsModal" class="backdrop-blur" persistent>
                <x-header title="Notifications" separator />
                No Notifications

                <x-slot:actions>
                    <x-button label="Close" wire:click="hideNotificationsModal" class="btn-sm" />
                </x-slot:actions>
            </x-modal>

            {{-- All Consultant Details Modal --}}
            @if($selectedConsultant)
            <x-modal wire:model="showConsultantModal" class="backdrop-blur" persistent>
                <x-header title="Consultant Details" separator />
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <div>
                        <img src="{{ $selectedConsultant->avatar ? $selectedConsultant->avatar : asset('storage/avatar/empty-user.jpg') }}" alt="Consultant" class="w-full h-40 object-cover" />
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">{{ $selectedConsultant->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $selectedConsultant->specialization }}</p>
                        <p class="text-sm text-gray-600">Experience: {{ $selectedConsultant->experience }}</p>
                        <p class="text-sm text-gray-600">Location: {{ $selectedConsultant->location }}</p>
                        <p class="text-sm text-gray-600">Email: {{ $selectedConsultant->email }}</p>
                        <p class="text-sm text-gray-600">Phone: {{ $selectedConsultant->phone }}</p>
                    </div>
                </div>

                <x-slot:actions>
                    <x-button label="Close" wire:click="hideConsultantModal" class="btn-sm" />
                </x-slot:actions>
            </x-modal>
            @endif
        </x-slot:content>
    </x-main>
</div>
