<?php
    use App\Services\YoutubeService;

    $url = YoutubeService::showVideo($video);
?>

<title>
    {{ $video->name }} | CTA 101
</title>

@include('admin.menu')
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- gallery -->
		<!-- gallery -->
        <div class="gallery">
            <h2 class="w3ls_head">
                {{ $video->name }}
            </h2>
            
            <div class="gallery-grids">
                <div class="gallery-top-grids">
                    <div class="col-sm-8 gallery-grids-left">
                        <div class="gallery-grid">
                            <!-- <img src="{{ asset('/storage/'.$video->thumbnail) }}" alt="" /> -->
                            
                            <iframe width="100%" height="315" class="video" src="{{ $url }}" frameborder="0" allowfullscreen></iframe> 
                        </div>
                    </div>

                    <div class="col-sm-4 gallery-grids-left">
                        <div class="gallery-grid">
                            <h2>
                                More Videos
                            </h2>

                            <ul>
                                @foreach($more as $video)
                                    <li>
                                        <a href="">
                                            <img class="thumbs" src="{{ asset('/storage/'.$video->thumbnail) }}" alt="" /> <br />
                                            <span>
                                                {{ $video->name }}
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
                <script src="js/lightbox-plus-jquery.min.js"> </script>
            </div>
        </div>
        <!-- //gallery -->
<!--main content end-->
@include('admin.footer')