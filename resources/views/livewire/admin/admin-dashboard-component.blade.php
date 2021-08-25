<main>
<div class="container mt-5 mb-5">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fas fa-chart-pie"></i>
        <span class="count-numbers">${{$totalRevenue}}</span>
        <span class="count-name">Total Revenue</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fas fa-cash-register"></i>
        <span class="count-numbers">{{$totalSales}}</span>
        <span class="count-name">Total Sales</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fas fa-hand-holding-usd"></i>
        <span class="count-numbers">${{$todayRevenue}}</span>
        <span class="count-name">Today's Revenue</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fas fa-donate"></i>
        <span class="count-numbers">{{$todaySales}}</span>
        <span class="count-name">Today's Sales</span>
      </div>
    </div>
  </div>
</div>

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
                                Latest Orders
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</main>