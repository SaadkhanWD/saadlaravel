<div>
    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 ">
                                <label class="lead">Update Coupon</label> 
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.coupons')}}" class="btn btn-primary btn-sm float-right">All coupons</a>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="">
                        <form class="col-md-12 mt-3 mb-3" wire:submit.prevent="updateCoupon">
                            <div class="form-group">
                            <label class="lead">Coupon Code</label>
                            <input type="text" class="form-control input-md" placeholder="Coupon Code" wire:model="code" />
                            @error('code') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label class="lead">Coupon Type</label>
                                <select class="form-control" wire:model="type">
                                    <option value="">Select</option>
                                    <option value="fixed">Fixed</option>
                                    <option value="percent">Percentage</option>
                                </select>
                                @error('type') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label class="lead">Coupon Value</label>
                                <input type="text" class="form-control input-md" placeholder="Coupon Value" wire:model="value" />
                                @error('value') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label class="lead">Cart Value</label>
                                <input type="text" class="form-control input-md" placeholder="Cart Value" wire:model="cart_value" />
                                @error('cart_value') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary float-center">Update</button>
                            </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
