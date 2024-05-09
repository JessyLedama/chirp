<title>
    Categories | CTA 101
</title>

@include('admin.menu')
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">

                    @if (session()->has('success'))
                        <span class="alert alert-success">
                            {{ session('success') }}
                        </span>
                    @endif

                    <a href="{{ route('admin.subcategories.create') }}" class="btn btn-sm btn-default new-button">
                        New
                    </a>

                    Categories
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
                                Category
                            </th>
                            
                            <th>
                                Create Date
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(!$subcategories->isEmpty())
                            @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>
                                        <label class="i-checks m-b-none">
                                            <input type="checkbox" name="post[]">
                                            <i></i>
                                        </label>
                                    </td>
                                    
                                    <td>
                                        {{ ucfirst($subcategory->name) }}
                                    </td>

                                    <td>
                                        {{ ucfirst($subcategory->category->name) }}
                                    </td>
                                    
                                    <td>
                                        <span class="text-ellipsis">
                                            {{ $subcategory->created_at }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    No subcategories to show at this time.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
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
        </div>
    </section>
@include('admin.footer')