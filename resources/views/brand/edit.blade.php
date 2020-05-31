@extends("layout")
@section("title","Brand editing")
@section("categoryPage","BRAND")
@section("content")
<!-- form start -->
        <form role="form" action="{{url("admin/update-brand/{$brand->__get("id")}")}}" method="post" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Brand Name</label>
                    <input value="{{$brand->__get("brands_name")}}" class="form-control @error("brands_name") is-invalid @enderror" name="brands_name" type="text" id="exampleInputEmail1" placeholder="Brand name">
                    @error("brands_name")
                    <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <label>Product Image</label>
                <div class="form-group">
                        <input class="form-control" name="brand_image" type="file" placeholder="Brand image">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

<!-- /.card -->
@endsection
