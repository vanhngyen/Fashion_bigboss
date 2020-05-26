@extends("layout")
@section("title","Order Listing")
@section("categoryPage","ORDER")
@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Order listing
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
                    <a href="{{url("/new-order")}}" class="float-right btn btn-outline-primary">+</a>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>user name</th>
                            <th>Grand total</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->__get("id")}}</td>
                                <td>{{$order->User->__get("name")}}</td>
                                <td>{{$order->__get("grand_total")}}</td>
                                <td>{{$order->__get("created_at")}}</td>
                                <td>{{$order->__get("updated_at")}}</td>
                                <td>
                                    <a href="{{url("/edit-order/{$order->__get("id")}")}}" class="btn btn-warning waves-effect">Edit</a>
                                </td>
                                <td>
                                    <form action="{{url("/delete-order/{$order->__get("id")}")}}" method="post">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" onclick="return confirm('are you sure?');" class="btn btn-danger waves-effect">delete</button>
                                    </form>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

