<div>
<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <a href="/cart">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="border p-4 rounded" role="alert">
              Returning customer? <a href="#">Click here</a> to login
            </div>
          </div>
        </div>
      <form wire:submit.prevent="placeOrder">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Billing Details</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group">
                <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
                <select wire:model="country" class="form-control">
                  <option value="1">Select a country</option>    
                  <option value="2">Pakistan</option>    
                  <option value="3">Algeria</option>    
                  <option value="4">Afghanistan</option>    
                  <option value="5">Ghana</option>    
                  <option value="6">Albania</option>    
                  <option value="7">Bahrain</option>    
                  <option value="8">Colombia</option>    
                  <option value="9">Dominican Republic</option>    
                </select>
                @error('country') <span class="text-danger">{{$message}}</span> @enderror
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                  <input wire:model="firstname" type="text" class="form-control" name="c_fname">
                  @error('firstname') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                  <input wire:model="lastname" type="text" class="form-control" name="c_lname">
                  @error('lastname') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_companyname" class="text-black">Email Address </label>
                  <input wire:model="email" type="text" class="form-control" name="c_companyname">
                  @error('email') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input wire:model="line1" type="text" class="form-control" name="c_address" placeholder="Street address">
                  @error('line1') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>

              <div class="form-group">
                <input wire:model="line2" type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_state_country" class="text-black">State / Province <span class="text-danger">*</span></label>
                  <input wire:model="province" type="text" class="form-control" name="c_state_country">
                  @error('province') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                  <input wire:model="zipcode" type="text" class="form-control" name="c_postal_zip">
                  @error('zipcode') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">City <span class="text-danger">*</span></label>
                  <input wire:model="city" type="text" class="form-control" name="c_email_address">
                  @error('city') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input wire:model="mobile" type="text" class="form-control" name="c_phone" >
                  @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>

              <!-- <div class="form-group">
                <label for="c_create_account" class="text-black" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> Create an account?</label>
                <div class="collapse" id="create_an_account">
                  <div class="py-2">
                    <p class="mb-3">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                    <div class="form-group">
                      <label for="c_account_password" class="text-black">Account Password</label>
                      <input type="email" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
                    </div>
                  </div>
                </div>
              </div> -->


              <div class="form-group">
                <label for="c_ship_different_address" class="text-black" data-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false" aria-controls="ship_different_address"><input type="checkbox" value="1"  id="c_ship_different_address" wire:model="ship_to_different"> Ship To A Different Address?</label>
                @if($ship_to_different)
                <div >
                  <div class="py-2">
                    <div class="form-group">
                      <label for="c_diff_country" class="text-black">Country <span class="text-danger">*</span></label>
                      <select wire:model="s_country" class="form-control">
                        <option value="1">Select a country</option>    
                        <option value="2">Pakistan</option>    
                        <option value="3">Algeria</option>    
                        <option value="4">Afghanistan</option>    
                        <option value="5">Ghana</option>    
                        <option value="6">Albania</option>    
                        <option value="7">Bahrain</option>    
                        <option value="8">Colombia</option>    
                        <option value="9">Dominican Republic</option>    
                      </select>
                      @error('s_country') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                        <input wire:model="s_firstname" type="text" class="form-control"  name="c_diff_fname">
                        @error('s_firstname') <span class="text-danger">{{$message}}</span> @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                        <input wire:model="s_lastname" type="text" class="form-control"  name="c_diff_lname">
                        @error('s_lastname') <span class="text-danger">{{$message}}</span> @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_companyname" class="text-black">Email Address </label>
                        <input wire:model="s_email" type="text" class="form-control"  name="c_diff_companyname">
                        @error('s_email') <span class="text-danger">{{$message}}</span> @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
                        <input wire:model="s_line1" type="text" class="form-control"  name="c_diff_address" placeholder="Street address">
                        @error('s_line1') <span class="text-danger">{{$message}}</span> @enderror
                      </div>
                    </div>

                    <div class="form-group">
                      <input wire:model="s_line2" type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                    </div>

                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="c_diff_state_country" class="text-black">State / Province <span class="text-danger">*</span></label>
                        <input wire:model="s_province" type="text" class="form-control"  name="c_diff_state_country">
                        @error('s_province') <span class="text-danger">{{$message}}</span> @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_postal_zip" class="text-black">Postal / Zip <span class="text-danger">*</span></label>
                        <input wire:model="s_zipcode" type="text" class="form-control"  name="c_diff_postal_zip">
                        @error('s_zipcode') <span class="text-danger">{{$message}}</span> @enderror
                      </div>
                    </div>

                    <div class="form-group row mb-5">
                      <div class="col-md-6">
                        <label for="c_diff_email_address" class="text-black">City <span class="text-danger">*</span></label>
                        <input wire:model="s_city" type="text" class="form-control"  name="c_diff_email_address">
                        @error('s_city') <span class="text-danger">{{$message}}</span> @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                        <input wire:model="s_mobile" type="text" class="form-control"  name="c_diff_phone" placeholder="Phone Number">
                        @error('s_mobile') <span class="text-danger">{{$message}}</span> @enderror
                      </div>
                    </div>

                  </div>
                </div>
                @endif
              </div>

              <div class="form-group">
                <label for="c_order_notes" class="text-black">Order Notes</label>
                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
              </div>

            </div>
          </div>
          <div class="col-md-6">

            <!-- <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                <div class="p-3 p-lg-5 border">
                  
                  <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                  <div class="input-group w-75">
                    <input type="text" class="form-control" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-sm" type="button" id="button-addon2">Apply</button>
                    </div>
                  </div>

                </div>
              </div>
            </div> -->
            
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                  @if(Session::has('checkout'))
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      @foreach(Cart::instance('cart')->content() as $item)
                      <tr>
                        <td>{{$item->name}} <strong class="mx-2">x</strong>   {{$item->qty}}</td>
                        <td>${{$item->subtotal()}}</td>
                      </tr>
                      @endforeach
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Discount</strong></td>
                        <td class="text-black">-${{Session::get('checkout')['discount']}}</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                        <td class="text-black">${{Session::get('checkout')['subtotal']}}</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Tax</strong></td>
                        <td class="text-black">${{Session::get('checkout')['tax']}}</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><strong>${{Session::get('checkout')['total']}}</strong></td>
                      </tr>
                    </tbody>
                  </table>
                  @endif

                <div>
                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><input wire:model="paymentmode" type="radio" name="radioBtn" value="cod" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank"> Cash on Delivery</h3>
                    <div class="collapse" id="collapsebank">
                      <div class="py-2">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><input wire:model="paymentmode" type="radio" name="radioBtn" value="card" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque"> Card Payment</h3>

                    <div class="collapse" id="collapsecheque">
                      <div class="py-2">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-5">
                    <h3 class="h6 mb-0"><input wire:model="paymentmode" type="radio" name="radioBtn" value="paypal" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal"> Paypal</h3>
                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>
                  @error('paymentmode') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg py-3 btn-block" >Place Order</button>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
      </form>
        <!-- </form> -->
      </div>
    </div>
</div>
