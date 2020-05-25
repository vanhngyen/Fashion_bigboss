@extends("layout")
@section("title","Brand Listing")
@section("categoryPage","BRAND")
@section("content")
<!-- form start -->
        <form role="form" action="{{url("/update-brand/{$brand->__get("id")}")}}" method="post">
            @method("PUT")
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Brand Name</label>
                    <input value="{{$brand->__get("brands_name")}}" class="form-control @error("brands_name") is-invalid @enderror" name="brands_name" type="text" id="exampleInputEmail1" placeholder="Brand name">
                </div>
                @error("brands_name")
                <span class="error invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

<!-- /.card -->
@endsection
