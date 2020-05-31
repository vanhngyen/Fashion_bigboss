@extends("layout")
@section("title","Brand Listing")
@section("categoryPage","BRAND")
@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Brand listing
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="header">
                    <a href="{{url("admin/new-brand")}}" class="float-right btn btn-outline-primary">+</a>
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brand Image</th>
                            <th>Brand name</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{$brand->__get("id")}}</td>
                                <td><img src="{{$brand->getImage()}}" width="50" height="50"/></td>
                                <td>{{$brand->__get("brands_name")}}</td>
                                <td>{{$brand->__get("created_at")}}</td>
                                <td>{{$brand->__get("updated_at")}}</td>
                                <td>
                                    <a href="{{url("admin/edit-brand/{$brand->__get("id")}")}}" class="btn btn-warning waves-effect">Edit</a>
                                </td>
                                <td>
                                    <form action="{{url("admin/delete-brand/{$brand->__get("id")}")}}" method="post">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger waves-effect">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
