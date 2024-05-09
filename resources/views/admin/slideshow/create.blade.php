<title>
    New Slideshow | CTA 101
</title>

@include('admin.menu')
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	    <div class="form-w3layouts">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- page start-->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <a href="{{ route('admin.videos.index') }}" class="btn btn-sm btn-default new-button">
                            All Slideshows
                        </a>

                        Create a New Slideshow
                   </header>

                    <div class="panel-body">
                        <div class="position-center">
                            <form method="post" action="{{ route('admin.slides.store') }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName" class="col-lg-2 col-sm-2 control-label">
                                        Name
                                    </label>
                                    
                                    <div class="col-lg-10">
                                        <input name="name" type="text" class="form-control" id="inputName" placeholder="Name" require>
                                        <p class="help-block">
                                            Enter slideshow name here.
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputImage" class="col-lg-2 col-sm-2 control-label">
                                        Image
                                    </label>
                                    
                                    <div class="col-lg-10">
                                        <input name="image" type="file" class="form-control" id="inputImage" placeholder="Name">
                                        <p class="help-block">
                                            Upload a thumbnail here.
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">
                                        Description
                                    </label>
                                    
                                    <div class="col-lg-10">
                                        <textarea name="description" type="text" class="form-control" id="inputDescription" placeholder="Name"></textarea>
                                        <p class="help-block">
                                            Enter a description here.
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<!--main content end-->
@include('admin.footer')