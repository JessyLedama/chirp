<?php

use App\Models\Chirp; 
use Illuminate\Database\Eloquent\Collection; 
use Livewire\Attributes\On; 
use Livewire\Volt\Component;
use App\Services\LikeChirpService;

new class extends Component {
    public Collection $chirps; 
    
    public function mount(): void
    {
        $this->getChirps(); 
    } 

    #[On('chirp-created')]

    public function getChirps(): void
    {
        $this->chirps = Chirp::with(['user', 'likes', 'comments'])->latest()->get();
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
                    {{ $chirp->created_at->diffForHumans() }}
                </span>
                
                <!-- <span class="time">
                    {{ $chirp->created_at->format('j M Y') }}
                </span> -->

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
                        <a href="{{ route('user.show', $chirp->user->name) }}">
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
                        <span class="stats-text">
                            259 Shares
                        </span>
                        
                        <span class="stats-text">
                            {{ count($chirp->comments) }} Comments
                        </span>
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
                        <span class="stats-total">
                            {{ count($chirp->likes) }}
                        </span>
                    </div>
                </div>

                <div class="timeline-footer">                    
                    @php 
                        $chirpData = [
                            'chirp_id' => $chirp->id,
                            'user_id' => Auth::id(),
                        ];
                    @endphp

                    @if(LikeChirpService::liked($chirpData) == true)
                        <span class="fa fa-thumbs-up"></span>
                    @else
                        <form id="likeForm" action="{{ route('likechirp') }}" method="post">
                            @csrf 
                            <input type="hidden" name="chirp_id" value="{{ $chirp->id }}">

                            <span class="fa fa-thumbs-up"></span>

                            <input id="likeButton" type="submit" value="Like">
                        </form>
                    @endif

                    <div class="timeline-comment-box">
                        <div class="user">
                            @if(!$chirp->user->image == null)
                                <span class="userimage">
                                    <img src="{{ asset('/storage/'.$chirp->user->image) }}" alt="">
                                </span>
                            @else
                                <span class="fa fa-user-circle-o tl-no-profile-pic"></span>
                            @endif
                        </div>
                    
                        <livewire:comment.create :chirpId="$chirp->id"/>
                </div>
                       
                <!-- Comments -->
                <div class="dropdown">
                    <a class="dropbtn m-r-15 text-inverse-lighter">
                        <i class="fa fa-comments fa-fw fa-lg m-r-3"></i>
                        Comments
                        <span class="fa fa-caret-down"></span>
                    </a>
                    
                    <div class="dropdown-content">
                        @foreach($chirp->comments as $comment)
                            <a href="#">
                                {{ $comment->comment }}
                            </a>
                        @endforeach
                    </div>

                    <!-- <a href="javascript:;" class="m-r-15 text-inverse-lighter">
                        <i class="fa fa-share fa-fw fa-lg m-r-3"></i> 
                        Share
                    </a> -->
                </div>

                <span class="pull-right text-muted views">
                    18 Views
                </span>
            </div>
            <!-- end timeline-body -->
        </li>
    @endforeach

    <script>
        $(document).ready(function(){
            $('#likeButton').click(function(e){
                e.preventDefault();
                var formData = $('#likeForm').serialize();

                $.ajax({
                    url: 'likechirp',
                    type: 'POST',
                    data: formData,
                    success: function(response){
                        alert('You like this post');
                    },
                    error: function(xhr, status, error){
                        alert('Failed')
                        console.error(error);
                    }
                });
            });
        });
    </script>
</ul>
<!-- end timeline -->

