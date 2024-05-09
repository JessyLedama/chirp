<link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">
  
  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    @if(!$slides == null)
      @foreach($slides as $slide)
        <div class="carousel-item active">
          <img src="{{ asset('/storage/'.$slide->image) }}" alt="{{ $slide->name }}" class="d-block img-responsive slide-image" style="width:100%">
        </div>
      @endforeach
    @else
      <div>
        <span>
          No slides to show
        </span>
      </div>
    @endif
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
