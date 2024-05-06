<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Services\RandomStringService;

new class extends Component
{
    use WithFileUploads;

    public $image = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        if(!Auth::user()->image == null)
        {
            $this->image = Auth::user()->image;
        }
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileImage(): void
    {
        $user = Auth::user();

        $this->validate([
            'image' => ['required'],
        ]); 

        $image = $this->image->store('profiles');

        $user->image = $image;

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile picture.") }}
        </p>
    </header>

    <div>
        @if(Auth::user()->image == null)
            <h2>
                You do not have a profile picture
            </h2>
        @else
            <h2>
                Your current profile picture
            </h2>
            <img class="profile-pic" src="{{ asset('/storage/'.Auth::user()->image) }}" alt="">
        @endif
    </div>

    <form wire:submit="updateProfileImage" class="mt-6 space-y-6">
        <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input wire:model="image" id="image" name="image" type="file" class="mt-1 block w-full" required autofocus autocomplete="image" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>


