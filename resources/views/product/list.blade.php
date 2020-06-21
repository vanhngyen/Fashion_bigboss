@extends("layout")
@section("title","Product Listing")
@section("categoryPage","PRODUCT")
@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Product listing
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
                    <a href="{{url("admin/new-product")}}" class="float-right btn btn-outline-primary">+</a>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->__get("id")}}</td>
                                <td>{{$product->__get("product_name")}}</td>
                                <td><img src="{{$product->__get('product_image')}}" width="50" height="50"/></td>
                                <td>{{$product->__get("product_desc")}}</td>
                                <td>{{number_format($product->__get("price"))}}$</td>
                                <td>{{$product->__get("qty")}}</td>
                                <td>{{$product->Category->__get("category_name")}}</td>
                                <td>{{$product->Brand->__get("brands_name")}}</td>
                                <td>{{$product->__get("created_at")}}</td>
                                <td>{{$product->__get("updated_at")}}</td>
                                <td>
                                    <a href="{{url("admin/edit-product/{$product->__get("id")}")}}" class="btn btn-warning waves-effect">Edit</a>
                                </td>
                                <td>
                                    <form action="{{url("admin/delete-product/{$product->__get("id")}")}}" method="post">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" onclick="return confirm('are you sure?');" class="btn btn-danger waves-effect">delete</button>
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
