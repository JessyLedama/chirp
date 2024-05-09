<title>
    New Video | CTA 101
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
                        All Videos
                    </a>

                        Create a New Video
                    </header>

                    <div class="panel-body">
                        <div class="position-center">
                            <form method="post" action="{{ route('admin.videos.store') }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName" class="col-lg-2 col-sm-2 control-label">
                                        Name
                                    </label>
                                    
                                    <div class="col-lg-10">
                                        <input name="name" type="text" class="form-control" id="inputName" placeholder="Name" require>
                                        <p class="help-block">
                                            Enter category name here.
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputThumbnail" class="col-lg-2 col-sm-2 control-label">
                                        Thumbnail
                                    </label>
                                    
                                    <div class="col-lg-10">
                                        <input name="thumbnail" type="file" class="form-control" id="inputThumbnail" placeholder="Name">
                                        <p class="help-block">
                                            Upload a thumbnail here.
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="selectCategory" class="col-lg-2 col-sm-2 control-label">
                                        Category
                                    </label>
                                    
                                    <div class="col-lg-10">
                                        <select name="subcategory_id" id="">
                                            <option value=" ">
                                                Select a Category
                                            </option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <p class="help-block">
                                            Select a category here.
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputLink" class="col-lg-2 col-sm-2 control-label">
                                        Link
                                    </label>
                                    
                                    <div class="col-lg-10">
                                        <input name="link" type="text" class="form-control" id="inputLink" placeholder="Link">
                                        <p class="help-block">
                                            Enter link here.
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPreview" class="col-lg-2 col-sm-2 control-label">
                                        Preview
                                    </label>
                                    
                                    <div class="col-lg-10">
                                        <input name="preview" type="text" class="form-control" id="inputPreview" placeholder="Preview">
                                        <p class="help-block">
                                            Enter preview link here.
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