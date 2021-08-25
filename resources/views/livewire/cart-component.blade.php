<div>
<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
      @if(Session::has('coupon-message'))
      <div class="alert alert-danger" role="alert">{{Session::get('coupon-message')}}</div>
      @endif
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              @if (Session::has('success_message'))
              <div class="alert alert-success">
                <strong>Success</strong> {{Session::get('success_message')}}
              </div>
              @endif
              @if(Cart::instance('cart')->count() > 0)
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach (Cart::instance('cart')->content() as $item)
                  <tr>
                    <td class="product-thumbnail">
                      <img src="{{asset ('images')}}/{{$item->model->image}}" alt="{{$item->model->name}}" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</h2>
                    </td>
                    @if($item->model->sale_price > 0)
                    <td>${{$item->model->sale_price}}</td>
                    @else
                    <td>${{$item->model->regular_price}}</td>
                    @endif
                    <td>
                      <div class="input-group" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" value="{{$item->qty}}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button" wire:click.prevent="increaseQuantity('{{$item->rowId}}')">&plus;</button>
                        </div>
                      </div>
                    </td>
                    <td>${{$item->subtotal()}}</td>
                    <td><a href="#" class="btn btn-primary btn-sm" wire:click.prevent="destroy('{{$item->rowId}}')">X</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
              <div class="h3 text-center">
                You have no item in your cart
              </div>
              @endif
            </div>
          </form>
        </div>

        @if(Cart::instance('cart')->count()>0)
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block">Update Cart</button>
              </div>
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block" wire:click.prevent="destroyAll()">Clear Cart</button>
              </div>
              <div class="col-md-12 mt-2">
                <a href="/shop"><button class="btn btn-outline-primary btn-sm btn-block " >Continue Shopping</button></a>
              </div>
            </div>

            @if(!Session::has('coupon'))
            <form wire:submit.prevent="applyCouponCode">
             <div class="row">
               <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input wire:model="couponCode" name="coupon-code" type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button type="submit"class="btn btn-primary btn-sm">Apply Coupon</button>
               </div>
              </div>
            </form>
             @endif
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                   <div class="col-md-6 text-right">
                    <strong class="text-black">${{Cart::instance('cart')->subtotal()}}</strong>
                   </div>
                </div>
                @if(Session::has('coupon'))
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Discount ({{Session::get('coupon')['code']}}) <a href="#" wire:click.prevent="removeCoupon"><i class="fa fa-times text-danger">  Remove Coupon</i></a></span>
                  </div>
                   <div class="col-md-6 text-right">
                    <strong class="text-black"> - ${{$discount}}</strong>
                   </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal with Discount</span>
                  </div>
                   <div class="col-md-6 text-right">
                    <strong class="text-black">${{$subtotalAfterDiscount}}</strong>
                   </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Tax({{config('cart.tax')}}%)</span>
                  </div>
                   <div class="col-md-6 text-right">
                    <strong class="text-black">${{$taxAfterDiscount}}</strong>
                   </div>
                </div>

                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">${{$totalAfterDiscount}}</strong>
                  </div>
                </div>
                @else
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Tax</span>
                  </div>
                   <div class="col-md-6 text-right">
                    <strong class="text-black">${{Cart::instance('cart')->tax()}}</strong>
                   </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">${{Cart::instance('cart')->total()}}</strong>
                  </div>
                </div>
                @endif

                
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" wire:click.prevent="checkout"><small>Proceed To Checkout</small></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <a href="/shop"><button class="btn btn-outline-primary btn-block">Shop Now</button></a>
        </div>
      </div>
      @endif
    </div>
</div>
