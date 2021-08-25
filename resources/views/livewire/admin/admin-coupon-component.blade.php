<div>
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
                                All Coupons
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addcoupon')}}" class="btn btn-outline-primary btn-sm float-right">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Coupon Code</th>
                                    <th>Coupon Type</th>
                                    <th>Coupon Value</th>
                                    <th>Cart Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{$coupon->id}}</td>
                                    <td>{{$coupon->code}}</td>
                                    <td>{{$coupon->type}}</td>
                                    @if($coupon->type == 'fixed')
                                        <td>${{$coupon->value}}</td>
                                    @else
                                        <td>{{$coupon->value}}%</td>
                                    @endif
                                    <td>{{$coupon->cart_value}}</td>
                                    <td>
                                        <a href="{{route('admin.editcoupon',['coupon_id'=>$coupon->id])}}"> <i class="fa fa-edit fa-2x"></i>Edit</a>
                                        <a href="#" onclick="confirm('Are you sure you want to delete this Coupon?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})" class="ml-3"><i class="fa fa-times fa-2x text-danger"></i> </a>
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

