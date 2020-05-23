@extends("layout")
@section("title","edit-Category")
@section("categoryPage","CATEGORY")
@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        NEW CATEGORY
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
                    <form role="form" action="{{url("/update-category/{$category->__get("id")}")}}" method="post">
                        @method("PUT")
                        @csrf
                        <label>Category Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input value="{{$category->__get("category_name")}}" class="form-control @error("category_name") is-invalid @enderror" type="text" name="category_name" placeholder="Enter Name"/>
                                @error ("category_name")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
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

