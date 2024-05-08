<?php

use Livewire\Volt\Component;
use Illuminate\Http\Request;
use App\Models\LikeChirps;

new class extends Component
{
    public $likechirps;
    public $chirpId;
    public $hasLiked;

    public function mount($chirpId, $initialLikes)
    {
        $this->likechirps = $likechirps;
        $this->chirpId = $chirpId;
        $this->hasLiked = $hasLiked;
    }

    public function store(): void
    {
        $validated = $this->validate(
            [
                'chirp_id' => ['required', 'string', 'max:255'],
            ]
        );

        auth()->user()->likechirps()->create($validated);

        $this->message = '';

        $this->dispatch('chirp-created'); 
    } 
}

?>

<div>
    <form class="post-chirp" wire:submit="store"> 
        <!-- <input wire:model="message" placeholder="{{ __('What say you?') }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"/>

        <x-input-error :messages="$errors->get('message')" class="mt-2" /> -->

        <x-primary-button class="mt-4">{{ __('Post') }}</x-primary-button>
    </form> 
</div>
