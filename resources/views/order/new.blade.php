@extends("layout")
@section("contentHeader","Order")
@section("title","New Order")
@section("content")

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        NEW ORDER
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
                    <form role="form" action="{{url("/save-order")}}" method="post">
                        @method("POST")
                        @csrf
                        <label>user</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="user_id" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{$user->__get("id")}}">{{$user->__get("name")}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label>grand total</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control @error("grand_total") is-invalid @enderror" type="number" name="grand_total" placeholder="Enter grand total"/>
                                @error("grand_total")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
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

