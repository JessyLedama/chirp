<link rel="stylesheet" href="{{ asset('css/custom.css')}}">
<x-app-layout>
	@include('carousel')
    
	<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="w3_agile_banner_bottom_grid">
				<div id="owl-demo" class="owl-carousel owl-theme">
					@foreach($topVideos as $video)
						<div class="item">
							<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
								
								<a href="{{ route('video.show', $video->slug) }}" class="hvr-shutter-out-horizontal">
									<img src="{{ asset('/storage/'.$video->thumbnail) }}" title="album-name" class="img-responsive" alt="{{ $video->name }} Image" />
								</a>

								<div class="mid-1 agileits_w3layouts_mid_1_home">
									<div class="w3l-movie-text">
										<h6>
											<a href="{{ route('video.show', $video->slug) }}">
												{{ ucwords($video->name) }}
											</a>
										</h6>							
									</div>

									<div class="mid-2 agile_mid_2_home">
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>			
		</div>
	</div>

	<!-- Tabs Section -->
	<div class="general">
		<h4 class="latest-text w3_latest_text">Featured Videos</h4>
		<div class="container">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#featured" id="featured-tab" role="tab" data-toggle="tab" aria-controls="featured" aria-expanded="true">
							Featured
						</a>
					</li>
					
					<li role="presentation">
						<a href="#topVideos" role="tab" id="topVideos-tab" data-toggle="tab" aria-controls="topVideos" aria-expanded="false">
							Top Videos
						</a>
					</li>
					
					<li role="presentation">
						<a href="#latestVideos" role="tab" id="latestVideos-tab" data-toggle="tab" aria-controls="latestVideos" aria-expanded="false">
							Recently Added
						</a>
					</li>
				</ul>
				<div id="myTabContent" class="tab-content">

					<!-- Featured Videos -->
					<div role="tabpanel" class="tab-pane fade active in" id="featured" aria-labelledby="featured-tab">
						<div class="w3_agile_featured_movies">
							@if(!$featured == null)
								@foreach($featured as $video)
									<div class="col-md-2 content">
										<a href="{{ route('video.show', $video->slug) }}" class="hvr-shutter-out-horizontal">
											<img src="{{ asset('/storage/'.$video->thumbnail) }}" title="album-name" class="img-responsive" alt="{{ $video->name }} Image" />
										</a>

										<div class="mid-1 agileits_w3layouts_mid_1_home">
											<div class="w3l-movie-text">
												<h6>
													<a href="{{ route('video.show', $video->slug) }}">
														{{ $video->name }}
													</a>
												</h6>							
											</div>
										</div>
									</div>
								@endforeach
							@else
								<span>
									You dont have any featured videos
								</span>
							@endif
							<div class="clearfix"> </div>
						</div>
					</div>

					<!-- Top Videos -->
					<div role="tabpanel" class="tab-pane fade" id="topVideos" aria-labelledby="topVideos-tab">
						@foreach($topVideos as $video)
							<div class="col-md-2 content">
								<a href="{{ route('video.show', $video->slug) }}" class="hvr-shutter-out-horizontal">
									<img src="{{ asset('/storage/'.$video->thumbnail) }}" title="album-name" class="img-responsive" alt="{{ $video->name }} Image" />
								</a>

								<div class="mid-1 agileits_w3layouts_mid_1_home">
									<div class="w3l-movie-text">
										<h6>
											<a href="{{ route('video.show', $video->slug) }}">
												{{ $video->name }}
											</a>
										</h6>							
									</div>
								</div>
							</div>
						@endforeach
						<div class="clearfix"> </div>
					</div>

					<!-- Latest Videos -->
					<div role="tabpanel" class="tab-pane fade" id="latestVideos" aria-labelledby="latestVideos-tab">
                        @if(!$latestVideos == null)
                            @foreach($latestVideos as $video)
                                <div class="col-md-2 content">
                                    <a href="{{ route('video.show', $video->slug) }}" class="hvr-shutter-out-horizontal">
                                        <img src="{{ asset('/storage/'.$video->thumbnail) }}" title="album-name" class="img-responsive" alt="{{ $video->name }} Image" />
                                    </a>
                                    <div class="mid-1 agileits_w3layouts_mid_1_home">
                                        <div class="w3l-movie-text">
                                            <h6>
                                                <a href="{{ route('video', $video->slug) }}">
                                                    {{ $video->name }}
                                                </a>
                                            </h6>							
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div>
                                <span>
                                    You dont have any top videos
                                </span>
                            </div>
                        @endif
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //general -->

	<!-- Most Popular Videos -->
	<div class="Latest-tv-series">
		<h4 class="latest-text w3_latest_text w3_home_popular">
			Most Popular Videos
		</h4>
		
		<div class="container">
			<div class="w3_agile_featured_movies">
				@foreach($topVideos as $video)
					<div class="col-md-2 content">
						<a href="{{ route('video.show', $video->slug) }}" class="hvr-shutter-out-horizontal">
							<img src="{{ asset('/storage/'.$video->thumbnail) }}" title="album-name" class="img-responsive" alt="{{ $video->name }} Image" />
						</a>

						<div class="mid-1 agileits_w3layouts_mid_1_home">
							<div class="w3l-movie-text">
								<h6>
									<a href="{{ route('video.show', $video->slug) }}">
										{{ $video->name }}
									</a>
								</h6>							
							</div>
						</div>
					</div>
				@endforeach
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<script src="js/jquery.slidey.js"></script>
    <script src="js/jquery.dotdotdot.min.js"></script>

	<script type="text/javascript">
		$("#slidey").slidey({
			interval: 8000,
			listCount: 5,
			autoplay: false,
			showList: true
		});
		$(".slidey-list-description").dotdotdot();
	</script>
    <!-- //banner -->

</x-app-layout>
