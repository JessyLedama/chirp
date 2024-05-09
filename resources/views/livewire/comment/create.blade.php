<?php

use Livewire\Volt\Component;
use Illuminate\Http\Request;
use App\Models\Comment;

new class extends Component
{
    public $comment = '';
    public $chirpId;

    public function store(): void
    {
        $validated = $this->validate([
            'comment' => ['required', 'string', 'max:310'],
        ]);

        $validated['user_id'] = auth()->id(); 

        $validated['chirp_id'] = $this->chirpId;

        auth()->user()->comments()->create($validated);

        $this->comment = '';
    }
}

?>

<div class="input-group">
    <div class="input">
        <form wire:submit="store">
            <div class="input-group">
                <input type="text" wire:model="comment" class="form-control rounded-corner" placeholder="Write a comment...">

                <x-input-error :messages="$errors->get('comment')" class="mt-2" />

                <span class="input-group-btn p-l-10">
                    
                    <x-primary-button class="mt-4 comment-chirp">{{ __('Comment ') }}</x-primary-button>
                </span>
            </div>
        </form>
    </div>
</div>
