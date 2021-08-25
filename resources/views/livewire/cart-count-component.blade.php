<a href="/cart" class="site-cart">
    <span class="icon icon-shopping_cart"></span>
    @if(Cart::instance('cart')->count() > 0)
    <span class="count">{{Cart::instance('cart')->count()}}</span>
    @endif
</a>
