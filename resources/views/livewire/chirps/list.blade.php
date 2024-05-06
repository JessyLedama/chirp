<?php

use App\Models\Chirp; 
use Illuminate\Database\Eloquent\Collection; 
use Livewire\Attributes\On; 
use Livewire\Volt\Component;

new class extends Component {
    public Collection $chirps; 
    
    public function mount(): void
    {
        $this->getChirps(); 
    } 

    #[On('chirp-created')]

    public function getChirps(): void
    {
        $this->chirps = Chirp::with('user')->latest()->get();

    } 

    public function edit(Chirp $chirp): void
    {
        $this->editing = $chirp;

        $this->getChirps();
    } 

    #[On('chirp-edit-canceled')]

    #[On('chirp-updated')] 

    public function disableEditing(): void
    {
        $this->editing = null;

        $this->getChirps();
    } 

    public function delete(Chirp $chirp): void
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        $this->getChirps();
    } 

}; ?>

<!-- begin timeline -->
<ul class="timeline">
    @foreach($chirps as $chirp)
        <li>
            <!-- begin timeline-time -->
            <div class="timeline-time">
                <span class="date">
                    {{ $chirp->created_at->format('j M Y') }}
                </span>
                
                <span class="time">
                    {{ $chirp->created_at->format('g:i a') }}
                </span>

                @unless ($chirp->created_at->eq($chirp->updated_at))
                    <small class="text-sm text-gray-600"> 
                        &middot; {{ __('edited') }}
                    </small>
                @endunless
            </div>
            <!-- end timeline-time -->
            
            <!-- begin timeline-icon -->
            <div class="timeline-icon">
                <a href="javascript:;">&nbsp;</a>
            </div>
            <!-- end timeline-icon -->
            
            <!-- begin timeline-body -->
            <div class="timeline-body">
                <div class="timeline-header">
                    @if(!$chirp->user->image == null)
                        <span class="userimage">
                            <img src="{{ asset('/storage/'.$chirp->user->image) }}" alt="">
                        </span>
                    @else
                        <span class="fa fa-user-circle-o tl-no-profile-pic"></span>
                    @endif
                    
                    <span class="username">
                        <a href="javascript:;">
                            {{ ucfirst($chirp->user->name) }}
                        </a> 
                        <small></small>
                    </span>

                    <span class="pull-right text-muted">
                        @if ($chirp->user->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link wire:click="edit({{ $chirp->id }})">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link wire:click="delete({{ $chirp->id }})" wire:confirm="Are you sure to delete this chirp?"> 
                                        {{ __('Delete') }}
                                    </x-dropdown-link> 
                                </x-slot>
                            </x-dropdown>
                        @endif
                    </span>
                </div>

                <div class="timeline-content">
                    <p>
                        {{ $chirp->message }}
                    </p>
                </div>

                <div class="timeline-likes">
                    <div class="stats-right">
                        <span class="stats-text">259 Shares</span>
                        <span class="stats-text">21 Comments</span>
                    </div>
                    <div class="stats">
                        <span class="fa-stack fa-fw stats-icon">
                        <i class="fa fa-circle fa-stack-2x text-danger"></i>
                        <i class="fa fa-heart fa-stack-1x fa-inverse t-plus-1"></i>
                        </span>
                        <span class="fa-stack fa-fw stats-icon">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                        </span>
                        <span class="stats-total">4.3k</span>
                    </div>
                </div>
                <div class="timeline-footer">
                    <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                    <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a> 
                    <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-share fa-fw fa-lg m-r-3"></i> Share</a>

                    <span class="pull-right text-muted">
                        18 Views
                    </span>
                </div>
                <div class="timeline-comment-box">
                    <div class="user"><img src="https://bootdey.com/img/Content/avatar/avatar3.png"></div>
                    <div class="input">
                        <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control rounded-corner" placeholder="Write a comment...">
                            <span class="input-group-btn p-l-10">
                            <button class="btn btn-primary f-s-12 rounded-corner" type="button">Comment</button>
                            </span>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end timeline-body -->
        </li>
    @endforeach
</ul>
<!-- end timeline -->

