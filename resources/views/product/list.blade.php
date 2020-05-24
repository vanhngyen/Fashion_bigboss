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
                    <a href="{{url("new-product")}}" class="float-right btn btn-outline-primary">+</a>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->__get("id")}}</td>
                                <td>{{$product->__get("product_name")}}</td>
                                <td>{{$product->__get("product_desc")}}</td>
                                <td>{{$product->__get("price")}}</td>
                                <td>{{$product->__get("qty")}}</td>
                                <td>{{$product->__get("category_id")}}</td>
                                <td>{{$product->__get("brand_id")}}</td>
                                <td>{{$product->__get("created_at")}}</td>
                                <td>{{$product->__get("updated_at")}}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
