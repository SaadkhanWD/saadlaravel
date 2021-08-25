<main>
  
    <div class="bg-light py-3">
          <div class="container">
            <div class="row">
              <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Wishlist</strong></div>
            </div>
          </div>
    </div><br>
    <div class="container">
        @if(Cart::instance('wishlist')->content()->count() > 0)
    <div class="row mb-5">
        @foreach (Cart::instance('wishlist')->content() as $item)
        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
          <div class="block-4 text-center border">
            <figure class="block-4-image">
              <a href="{{route('product.details',['slug'=>$item->model->slug])}}"><img src="{{asset ('images')}}/{{$item->model->image}}" alt="{{$item->model->name}}" class="img-fluid"></a>
            </figure>
            <div class="block-4-text p-4">
              <h3><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a></h3>
              <p class="mb-0">{{$item->model->short_description}}</p>
              <a href="#" class="btn btn-outline-primary mt-3" wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')"><small>Remove from Wishlist</small></a>
              <div class="product-wish">
                <a href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})"><i class="fa fa-heart fill-heart"></i></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        </div>
        @else
        <p class="h3 text-center mt-4 mb-5">No Items in Wishlist</p>
        @endif
      </div>
</main>    
