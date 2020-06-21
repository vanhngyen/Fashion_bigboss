@extends("layout")
@section("title","new-brand")
@section("categoryPage","BRAND")
@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        NEW BRAND
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
                    <form role="form" action="{{url("admin/save-brand")}}" method="post" enctype="multipart/form-data">
                        @method("POST")
                        @csrf
                        <label>Brand Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control @error("brands_name") is-invalid @enderror" type="text" name="brands_name" placeholder="Enter Name"/>
                                @error("brands_name")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <label>Brand Image</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" name="brand_image" type="text" placeholder="Brand image">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
