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
            <x-header title="Q and A" subtitle="For super quick responses to your questions, feel free to use our chatbot, Agrik" separator progress-indicator />

            <x-collapse>
                <x-slot:heading>
                    What is sustainable farming and why is it important?
                </x-slot:heading>
                <x-slot:content>
                    Sustainable farming involves agricultural practices that meet current food needs without compromising the ability of future generations to meet theirs. It's important because it helps to maintain environmental health, economic profitability, and social and economic equity.
                </x-slot:content>
            </x-collapse>

            <x-collapse>
                <x-slot:heading>
                    How can technology improve farming practices?
                </x-slot:heading>
                <x-slot:content>
                    Technology can improve farming practices by increasing crop yields, reducing the use of water and chemicals, and making farming more sustainable. Technologies such as precision agriculture, drones, sensors, and AI can help farmers make better decisions and reduce environmental impact.
                </x-slot:content>
            </x-collapse>

            <x-collapse>
                <x-slot:heading>
                    What are the benefits of organic farming?
                </x-slot:heading>
                <x-slot:content>
                    Organic farming benefits include healthier soil, reduced pollution from runoff, increased biodiversity, and reduced exposure to pesticides and chemicals for both farmers and consumers. It often produces food that some people consider to be more flavorful and nutritious.
                </x-slot:content>
            </x-collapse>

            <x-collapse>
                <x-slot:heading>
                    How does farming impact climate change?
                </x-slot:heading>
                <x-slot:content>
                    Farming impacts climate change through the emission of greenhouse gases such as methane and nitrous oxide, deforestation for agricultural expansion, and the energy used in farming operations. Sustainable farming practices can help reduce these impacts.
                </x-slot:content>
            </x-collapse>

            <x-collapse>
                <x-slot:heading>
                    What are the best practices for water management in agriculture?
                </x-slot:heading>
                <x-slot:content>
                    Best practices for water management in agriculture include using drip irrigation to minimize water waste, implementing rainwater harvesting systems, selecting drought-resistant crop varieties, and scheduling irrigation based on crop needs and weather conditions to optimize water use efficiency.
                </x-slot:content>
            </x-collapse>

            <x-collapse>
                <x-slot:heading>
                    How can farmers adapt to climate change?
                </x-slot:heading>
                <x-slot:content>
                    Farmers can adapt to climate change by diversifying crops to reduce risk, implementing water-saving techniques, using climate-resistant crop varieties, practicing soil conservation methods, and adopting precision farming technologies to optimize resource use and crop yields.
                </x-slot:content>
            </x-collapse>
        </x-slot:content>
    </x-main>
</div>
