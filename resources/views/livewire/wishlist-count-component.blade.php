<a href="{{route('product.wishlist')}}" class="site-cart">
    <span class="icon icon-heart-o"></span>
    @if(Cart::instance('wishlist')->count() > 0)
    <span class="count">{{Cart::instance('wishlist')->count()}}</span>
    @endif
</a>
