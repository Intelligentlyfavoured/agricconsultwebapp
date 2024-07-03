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
            <x-button label="Back Home" icon="o-arrow-uturn-left" link="/consultant/home" class="btn-ghost btn-sm" responsive />
            <x-button label="Logout" icon="o-power" link="/logout" class="btn-ghost btn-sm" responsive />
        </x-slot:actions>
    </x-nav>

    <x-main>
        <x-slot:sidebar>

        {{--AVATAR HERE--}}
        @if(empty($this->avatar))
            <x-form wire:submit.prevent="uploadPhoto">
                <x-file wire:model="avatar" accept="image/png" crop-after-change>
                    <img src="{{ asset('storage/avatar/empty-user.jpg') }}" class="h-40 rounded-lg" />
                </x-file>
                <x-slot:actions>
                    <x-button label="Update Profile Photo" class="btn btn-success" type="submit" />
                </x-slot:actions>
            </x-form>
        @else
            <img src="{{ asset('storage/' . $this->avatar) }}" class="h-40 rounded-lg" />
        @endif
        </x-slot:sidebar>
        <x-slot:content>
            <div>
                <x-form wire:submit="updateProfile">
                    <x-header title="Profile information" separator />
                    <x-input wire:model="name" value="{{ $name }}" label="Name" />
                    <x-input wire:model="email" value="{{ $email }}" label="Email" />
                    <x-input wire:model="phone" value="{{ $phone }}" label="Phone" />
                    <x-input wire:model="address" value="{{ $address }}" label="Address"/>
                    <x-input wire:model="city" value="{{ $city }}" label="City"/>
                    <x-slot:actions>
                        <x-button label="Update Profile" class="btn btn-success" type="submit" />
                    </x-slot:actions>
                </x-form>
            </div>
        </x-slot:content>
    </x-main>

    Consultant Profile
</div>
