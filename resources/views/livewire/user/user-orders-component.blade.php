<div>
    <div>
        <style>
            nav svg{
                height: 20px;
            }
            nav .hidden{
                display:block !important;
            }
        </style>

        <div class="container" >
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
            @if($orders->count() > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6 h6 mt-3">
                                    All Orders
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Zipcode</th>
                                        <th>Subtotal</th>
                                        <th>Discount</th>
                                        <th>Tax</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->firstname}}</td>
                                        <td>{{$order->lastname}}</td>
                                        <td>{{$order->mobile}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->zipcode}}</td>
                                        <td>${{$order->subtotal}}</td>
                                        <td>${{$order->discount}}</td>
                                        <td>${{$order->tax}}</td>
                                        <td>${{$order->total}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>
                                            <a href="{{route('user.orderdetails',['order_id'=>$order->id])}}" class="btn btn-outline-primary btn-sm"><small>Details</small></a>                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$orders->links()}}
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p class=" mt-5 mb-2 h3 text-center">No orders yet</p><br>
                        <a href="/shop" class="btn btn-primary btn-block mb-5">Shop now</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
