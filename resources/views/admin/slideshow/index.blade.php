<title>
    Slideshows | CTA 101
</title>

@include('admin.menu')
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('admin.slides.create') }}" class="btn btn-sm btn-default new-button">
                        New
                    </a>

                    Videos
                </div>

                <div class="row w3-res-tb"> 
                    <div class="col-sm-5 m-b-xs">
                        <select class="input-sm form-control w-sm inline v-middle">
                            <option value="0">
                                Bulk action
                            </option>
                            <option value="1">
                                Delete selected
                            </option>
                            <option value="2">
                                Bulk edit
                            </option>
                            <option value="3">
                                Export
                            </option>
                        </select>

                        <button class="btn btn-sm btn-default">
                            Apply
                        </button>                
                    </div>
                    <div class="col-sm-4">
                </div>

                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <div>
                    @if (session()->has('success'))
                        <span class="alert alert-success">
                            {{ session('success') }}
                        </span>
                    @endif
                </div>
                <table class="table table-striped b-t b-light">
                    
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            
                            <th>
                                Name
                            </th>
                            
                            <th>
                                Create Date
                            </th>
                        </tr>
                    </thead>

                    
                    @if(!$slides->isEmpty())
                    <tbody>
                        @foreach($slides as $slide) 
                            <tr>
                                <td>
                                    <label class="i-checks m-b-none">
                                        <input type="checkbox" name="post[]">
                                        <i></i>
                                    </label>
                                </td>
                                
                                <td>
                                    <a href="{{ route('admin.videos.show', $slide->id) }}">
                                    {{ ucfirst($slide->name) }}
                                    </a>
                                </td>
                                
                                <td>
                                    <span class="text-ellipsis">
                                        <img class="thumbnail" src="{{ asset('/storage/'.$slide->image) }}" alt="">
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <footer class="panel-footer">
                    <div class="row">
                        
                        <div class="col-sm-5 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">
                                showing 20-30 of 50 items
                            </small>
                        </div>

                        <div class="col-sm-7 text-right text-center-xs">                
                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                <li>
                                    <a href="">
                                        <i class="fa fa-chevron-left"></i>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="">
                                        1
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="">
                                        2
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="">
                                        3
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="">
                                        4
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="">
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </footer>
                @else
                    <div class="col-lg-8 no-content">
                        <span>
                            No slides to show at this time.
                        </span>
                    </div>
                @endif
            </div>
            
        </div>
    </section>
@include('admin.footer')