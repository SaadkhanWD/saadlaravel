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
            @if(Session::has('order_message'))
            <div class="alert alert-info" role="alert">{{Session::get('order_message')}}</div>
            @endif
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
                                        <th colspan="2" class="text-center">Action</th>
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
                                        @if($order->status == 'ordered')
                                        <td class="text-warning font-weight-bold">{{$order->status}}</td>
                                        @elseif($order->status == 'delivered')
                                        <td class="text-success font-weight-bold">{{$order->status}}</td>
                                        @elseif($order->status == 'canceled')
                                        <td class="text-danger font-weight-bold">{{$order->status}}</td>
                                        @elseif($order->status == 'shipped')
                                        <td class="text-primary font-weight-bold">{{$order->status}}</td>
                                        @endif
                                        <td>{{$order->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn btn-outline-primary btn-sm"><small>Details</small></a>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-sm dropdown-toggle btn-sm" type="button" data-toggle="dropdown"><small>Status</small>
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu text-center">
                                                    <li><a href="" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')" class="dropdown-item box">Delivered</a></li>
                                                    <li><a href="" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')" class="dropdown-item box">Canceled</a></li>
                                                    <li><a href="" wire:click.prevent="updateOrderStatus({{$order->id}},'shipped')" class="dropdown-item box">Shipped</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$orders->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
