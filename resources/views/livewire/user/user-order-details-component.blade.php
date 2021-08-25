
<div>
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
                <div class="alert alert-danger" role="alert">{{Session::get('message')}}</div>
                @endif
                <div class="row">
                  <div class="col-md-12">
                      <div class="card mt-3">
                          <div class="card-header">
                              <div class="row">
                                  <div class="col-md-6 h6 mt-3">
                                      Order Status
                                  </div>
                                  <div class="col-md-6">
                                    <a href="{{route('user.orders')}}" class="btn btn-outline-primary btn-sm float-right">My Orders</a>
                                    @if($order->status == 'ordered')
                                    <a href="{{route('user.orders')}}" onclick="confirm('Are you sure you want to cancel your order?') || event.stopImmediatePropagation()" wire:click.prevent="cancelOrder" class="btn btn-outline-danger btn-sm float-right mr-2">Cancel Order</a>
                                    @endif
                                </div>
                              </div>
                          </div>
                          <div class="table-responsive p-3">
                              <table class="table table-striped">
                                <tr>
                                  <th>Order Id</th>
                                  <td>{{$order->id}}</td>
                                  <th>Order Date</th>
                                  <td>{{$order->created_at}}</td>
                                  <th>Order Status</th>
                                  @if($order->status == 'ordered')
                                  <td class="text-warning font-weight-bold">{{$order->status}}</td>
                                  @elseif($order->status == 'delivered')
                                  <td class="text-success font-weight-bold">{{$order->status}}</td>
                                  @elseif($order->status == 'canceled')
                                  <td class="text-danger font-weight-bold">{{$order->status}}</td>
                                  @elseif($order->status == 'shipped')
                                  <td class="text-primary font-weight-bold">{{$order->status}}</td>
                                  @endif
                                  @if($order->status == 'delivered')
                                  <th>Delivered Date</th>
                                  <td>{{$order->delivered_date}}</td>
                                  @elseif($order->status == 'canceled')
                                  <th>Cancel Date</th>
                                  <td>{{$order->canceled_date}}</td>
                                  @elseif($order->status == 'shipped')
                                  <th>Shipped Date</th>
                                  <td>{{$order->shipped_date}}</td>
                                  @endif
                                </tr>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6 h6 mt-3">
                                        Ordered Items
                                    </div>
                                </div>
                            </div>
                            <div class="site-blocks-table">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-total">SubTotal</th>
                                        <th class="product-total">Write a review</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($order->orderItems as $item)
                                      <tr>
                                        <td class="product-thumbnail">
                                          <img src="{{asset ('images')}}/{{$item->product->image}}" alt="{{$item->product->name}}" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                          <h2 class="h5 text-black" href="{{route('product.details',['slug'=>$item->product->slug])}}">{{$item->product->name}}</h2>
                                        </td>
                                        <td>
                                          <label class="h5">{{$item->quantity}}</label>
                                        </td>
                                        <td class="h5">${{$item->price * $item->quantity}}</td>
                                        @if($order->status == 'delivered' && $item->rstatus == false)
                                        <td>
                                          <a href="{{route('user.review',['order_item_id'=>$item->id])}}" class="h5 btn btn-primary"><i class="fa fa-comments mr-2"></i><small>Review</small></a>
                                        </td>
                                        @else
                                        <td>
                                          <a href="" class="h5 btn btn-primary disabled"><i class="fa fa-comments mr-2"></i><small>Review</small></a>
                                        </td>
                                        @endif
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                            </div>
                            <label class="text-center h3 mt-3 mb-2">Order Summary</label><hr>
                            <div class="container">
                              <div class="col-md-12">
                                <div class="row justify-content-end">
                                  <div class="col-md-12">
                                    <div class="row mb-3">
                                      <div class="col-md-6">
                                        <span class="text-black h6">Discount</span>
                                      </div>
                                       <div class="col-md-6 text-right">
                                        <strong class="text-danger h6">-${{$order->discount}}</strong>
                                       </div>
                                    </div><hr>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                      <span class="text-black h6">Subtotal<small> (After Discount)</small></span>
                                    </div>
                                     <div class="col-md-6 text-right">
                                      <strong class="text-black h6">${{$order->subtotal}}</strong>
                                     </div>
                                  </div><hr>
                                  <div class="row mb-3">
                                    <div class="col-md-6">
                                      <span class="text-black h6">Tax</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black h6">${{$order->tax}}</strong>
                                    </div>
                                  </div><hr>
                                  <div class="row mb-3">
                                    <div class="col-md-6">
                                      <span class="text-black h6">Total</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black h6">${{$order->total}}</strong>
                                    </div>
                                  </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
              <div class="col-md-12">
                  <div class="card mt-3">
                      <div class="card-header">
                          <div class="row">
                              <div class="col-md-6 h6 mt-3">
                                  Billing Details
                              </div>
                          </div>
                      </div>
                      <div class="table-responsive p-3">
                          <table class="table table-striped">
                            <tr>
                              <th>First Name</th>
                              <td>{{$order->firstname}}</td>
                              <th>Last Name</th>
                              <td>{{$order->lastname}}</td>
                            </tr>
                            <tr>
                              <th>Phone</th>
                              <td>{{$order->mobile}}</td>
                              <th>Email</th>
                              <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                              <th>Address</th>
                              <td>{{$order->line1}}</td>
                              <th>Line 2</th>
                              <td>{{$order->line2}}</td>
                            </tr>
                            <tr>
                              <th>City</th>
                              <td>{{$order->city}}</td>
                              <th>Province</th>
                              <td>{{$order->province}}</td>
                            </tr>
                            <tr>
                              <th>Country</th>
                              <td>{{$order->country}}</td>
                              <th>Zipcode</th>
                              <td>{{$order->zipcode}}</td>
                            </tr>
                          </table>
                      </div>
                  </div>
              </div>
          </div>

          @if($order->is_shipping_different)
          <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 h6 mt-3">
                                Shipping Details
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table table-striped">
                          <tr>
                            <th>First Name</th>
                            <td>{{$order->shipping->firstname}}</td>
                            <th>Last Name</th>
                            <td>{{$order->shipping->lastname}}</td>
                          </tr>
                          <tr>
                            <th>Phone</th>
                            <td>{{$order->shipping->mobile}}</td>
                            <th>Email</th>
                            <td>{{$order->shipping->email}}</td>
                          </tr>
                          <tr>
                            <th>Address</th>
                            <td>{{$order->shipping->line1}}</td>
                            <th>Line 2</th>
                            <td>{{$order->shipping->line2}}</td>
                          </tr>
                          <tr>
                            <th>City</th>
                            <td>{{$order->shipping->city}}</td>
                            <th>Province</th>
                            <td>{{$order->shipping->province}}</td>
                          </tr>
                          <tr>
                            <th>Country</th>
                            <td>{{$order->shipping->country}}</td>
                            <th>Zipcode</th>
                            <td>{{$order->shipping->zipcode}}</td>
                          </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
          <div class="col-md-12">
              <div class="card mt-3">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-md-6 h6 mt-3">
                              Transaction Details
                          </div>
                      </div>
                  </div>
                  <div class="table-responsive p-3">
                      <table class="table table-bordered">
                        <tr>
                          <th>Transaction Mode</th>
                          <td>{{$order->transaction->mode}}</td>
                        </tr>
                        <tr>
                          <th>Status</th>
                          <td>{{$order->transaction->status}}</td>
                        </tr>
                        <tr>
                          <th>Transaction Date</th>
                          <td>{{$order->transaction->created_at}}</td>
                        </tr>
                      </table>
                  </div>
              </div>
          </div>
      </div>

        </div>
    </div>
</div>
