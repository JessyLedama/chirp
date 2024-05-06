<x-app-layout>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user-show.css') }}">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="content" class="content content-full-width">
                    <div class="profile-content">
                        <div class="tab-content p-0">
                            <div class="tab-pane fade active show" id="profile-post">
                                <livewire:chirps.create />

                                <livewire:chirps.list />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>