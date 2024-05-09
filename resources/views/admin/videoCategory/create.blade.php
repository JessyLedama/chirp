<title>
    Create Category | CTA 101
</title>

@include('admin.menu')
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	    <div class="form-w3layouts">
            <!-- page start-->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-default new-button">
                        All Categories
                    </a>

                        Create a New Category
                    </header>

                    <div class="panel-body">
                        <div class="position-center">
                            <form method="post" action="{{ route('admin.categories.store') }}" class="form-horizontal" role="form">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName" class="col-lg-2 col-sm-2 control-label">
                                        Name
                                    </label>
                                    
                                    <div class="col-lg-10">
                                        <input name="name" type="text" class="form-control" id="inputName" placeholder="Name">
                                        <p class="help-block">
                                            Enter category name here.
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