@extends("layout")
@section("contentHeader","Product")
@section("title","New Product")
@section("content")

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        NEW PRODUCT
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
                <div class="body">
                    <form role="form" action="{{url("/save-product")}}" method="post" enctype="multipart/form-data">
                        @method("POST")
                        @csrf
                        <label>Product Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control @error("product_name") is-invalid @enderror" type="text" name="product_name" placeholder="Enter Name"/>
                                @error("product_name")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <label>Product Image</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" name="product_image" type="file" placeholder="Product image">
                            </div>
                        </div>
                        <label>Product Description</label>
                        <div class="form-group">
                            <div class="form-line">
                                 <textarea name="product_desc" placeholder="Description.." class="form-control @error("product_desc") is-invalid @enderror">
                    </textarea>
                                @error("product_desc")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <label>Price</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control @error("price") is-invalid @enderror" type="number" name="price" placeholder="Price.."/>
                                @error("price")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <label>Quantity</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control @error("qty") is-invalid @enderror" type="number" name="qty" placeholder="Qty.."/>
                                @error("qty")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <label>Category</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->__get("id")}}">{{$category->__get("category_name")}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <label>Brand</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="brand_id" class="form-control">
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->__get("id")}}">{{$brand->__get("brands_name")}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- /.card-body -->
                        <br>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
