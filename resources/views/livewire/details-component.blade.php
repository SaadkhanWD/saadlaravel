<main>
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{$product->name}}</strong></div>
      </div>
    </div>
  </div>  
  @php
  $witems = Cart::instance('wishlist')->content()->pluck('id');
  @endphp
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset ('images')}}/{{$product->image}}" alt="{{$product->name}}" class="img-fluid mb-2">
        </div>
        <div class="col-md-6 ">
          <div class="product-rating-1" >
            @php
              $avgrating = 0;
              $num_of_review = $product->orderItems->where('rstatus',1)->count();
            @endphp
            @if($num_of_review > 0)
            @foreach($product->orderItems->where('rstatus',1) as $orderItem)
              @php
               $avgrating = $avgrating + $orderItem->review->rating;
              @endphp
            @endforeach
            @php
             $avgrating = floor($avgrating/$num_of_review)   
            @endphp
            @endif
            @for($i=1;$i<=5;$i++)
                @if($i<=$avgrating)
                    <i class="fa fa-star" aria-hidden="true"></i>
                @else
                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                @endif
            @endfor
            <a href="#review" class="count-review ">({{$product->orderItems->where('rstatus',1)->count()}} review)</a>
           </div>
          <h2 class="text-black">{{$product->name}}</h2>
          <p>{{$product->short_description}}</p>
          @if($product->stock_status == 'instock')
          <span >Availability: <span class="text-success">{{$product->stock_status}}</span></span>
          @else
          <span >Availability: <span class="text-danger">{{$product->stock_status}}</span></span>
          @endif
          <hr>
          <p>{{$product->description}}</p>
          @if($product->sale_price > 0)
          <p><strong class="text-primary h4"><del>${{$product->regular_price}}</del></strong></p>
          <p><strong class="text-primary h4">${{$product->sale_price}}</strong></p>
          @else
          <p><strong class="text-primary h4">${{$product->regular_price}}</strong></p>
          @endif
          <div class="mb-1 d-flex">
            <label for="option-sm" class="d-flex mr-3 mb-3">
              <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" name="shop-sizes"></span> <span class="d-inline-block text-black">Small</span>
            </label>
            <label for="option-md" class="d-flex mr-3 mb-3">
              <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-md" name="shop-sizes"></span> <span class="d-inline-block text-black">Medium</span>
            </label>
            <label for="option-lg" class="d-flex mr-3 mb-3">
              <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-lg" name="shop-sizes"></span> <span class="d-inline-block text-black">Large</span>
            </label>
            <label for="option-xl" class="d-flex mr-3 mb-3">
              <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="shop-sizes"></span> <span class="d-inline-block text-black"> Extra Large</span>
            </label>
          </div>
          <div class="mb-5">
            <div class="input-group mb-3" style="max-width: 120px;">
            <div class="input-group-prepend">
              <button wire:click.prevent="decreaseQuantity" class="btn btn-outline-primary js-btn-minus" type="button" >&minus;</button>
            </div>
            <input wire:model="qty" type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
            <div class="input-group-append">
              <button wire:click.prevent="increaseQuantity" class="btn btn-outline-primary js-btn-plus" type="button" >&plus;</button>
            </div>
          </div>
          </div>
          @if($product->stock_status == 'instock' && $product->sale_price > 0)
          <a href="#" class="buy-now btn btn-sm btn-primary" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})">Add To Cart</a>
          @elseif($product->stock_status == 'instock' && $product->sale_price == 0)
          <a href="#" class="buy-now btn btn-sm btn-primary" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add To Cart</a>
          @else
          <a href="#" class="buy-now btn btn-sm btn-primary disabled" >Add To Cart</a>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="site-section block-3 site-blocks-2 bg-light" id="review">
    <div class="container">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="wrap-review-form">
              <div id="comments">
                <h2 class="woocommerce-Reviews-title ml-3">{{$product->orderItems->where('rstatus',1)->count()}} review for <span>{{$product->name}}</span></h2>
                <ol class="commentlist">
                  @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                  <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                    <div id="comment-20" class="comment_container"> 
                      <div class="comment-text">
                        <div class="star-rating">
                          <span class="width-{{$orderItem->review->rating * 20}}-percent">Rated <strong class="rating">{{$orderItem->review->rating}}</strong> out of 5</span>
                        </div>
                        <p class="meta"> 
                          <strong class="woocommerce-review__author">{{$orderItem->order->user->name}}</strong> 
                          <span class="woocommerce-review__dash">–</span>
                          <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A')}}</time>
                        </p>
                        <div class="description">
                          <p class="h6">"{{$orderItem->review->comment}}"</p>
                        </div>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ol>
              </div><!-- #comments -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Featured Products</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 ">
          <div class="nonloop-block-3 owl-theme owl-carousel">
           @foreach ($feature_products as $f_product)
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="{{asset ('images')}}/{{$f_product->image}}" alt="{{$f_product->name}}" href="{{route('product.details',['slug'=>$f_product->slug])}}" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="{{route('product.details',['slug'=>$f_product->slug])}}">{{$f_product->name}}</a></h3>
                  <p class="mb-0"></p>
                  @if($f_product->sale_price > 0)
                  <span class="text-primary font-weight-bold"><del>${{$f_product->regular_price}}</del></span>
                  <span class="text-primary font-weight-bold ml-3">${{$f_product->sale_price}}</span>
                  @else
                  <p class="text-primary font-weight-bold">${{$f_product->regular_price}}</p>
                  @endif
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
  