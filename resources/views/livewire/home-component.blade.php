<div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="site-blocks-cover" style="background-image: url(images/hero_1.jpg);" data-aos="fade">
        <div class="container">
          <div class="row align-items-start align-items-md-center justify-content-end">
            <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
              <h1 class="mb-2">Finding Your Perfect Shoes</h1>
              <div class="intro-text text-center text-md-left">
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla. </p>
                <p>
                  <a href="/shop" class="btn btn-sm btn-primary">Shop Now</a>
                </p>
              </div>
            </div>
          </div>
        </div>
     </div>
    </div>
    @foreach ($sliders as $slide)
    <div class="carousel-item">
      <a href="{{$slide->link}}">
      <div class="site-blocks-cover" style="background-image: url({{asset ('images/sliders')}}/{{$slide->image}});" data-aos="fade">
        <div class="container">
          <div class="row align-items-start align-items-md-center justify-content-end">
            <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
              <h1 class="mb-2">{{$slide->title}}</h1>
              <div class="intro-text text-center text-md-left">
                <p class="mb-4">{{$slide->subtitle}}</p>
                <span>{{$slide->price}}</span>
                <!--<p>
                  <a  class="btn btn-sm btn-primary">Shop Now</a>
                </p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

@if($sproducts->count() > 0)
<div class="site-section block-3 site-blocks-2 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 site-section-heading text-center pt-4">
        <h2>Flash Sale</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ">
        <div class="nonloop-block-3 owl-carousel owl-theme">
          @foreach ($sproducts as $sproduct)
          <div class="item ">
            <div class="block-4 text-center">
              <figure class="block-4-image">
                <a href="{{route('product.details',['slug'=>$sproduct->slug])}}"><img src=" {{ asset ('images')}}/{{$sproduct->image}}" alt="{{$sproduct->name}}"  class="img-fluid"></a>
              </figure>
              <div class="block-4-text p-4">
                <h3><a href="{{route('product.details',['slug'=>$sproduct->slug])}}">{{$sproduct->name}}</a></h3><br>
                <span class="text-primary font-weight-bold h6"><del>${{$sproduct->regular_price}}</del></span>
                <p class="text-primary font-weight-bold h4" >${{$sproduct->sale_price}}</p>
              </div>
            </div>
          </div>
          @endforeach
      </div>
    </div>
    </div>
  </div>
</div>
@endif

    <div class="site-section site-section-sm site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Shipping</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Returns</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Customer Support</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src=" {{ asset ('images/women.jpg')}}" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Collections</span>
                <h3>Women</h3>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src=" {{ asset ('images/children.jpg')}}" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Collections</span>
                <h3>Children</h3>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src=" {{ asset ('images/men.jpg')}}" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Collections</span>
                <h3>Men</h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Latest Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 ">
            <div class="nonloop-block-3 owl-carousel owl-theme">
              @foreach ($lproducts as $lproduct)
              @if($lproduct->stock_status == 'instock')
              <div class="item ">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <a href="{{route('product.details',['slug'=>$lproduct->slug])}}"><img src=" {{ asset ('images')}}/{{$lproduct->image}}" alt="{{$lproduct->name}}"  class="img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="{{route('product.details',['slug'=>$lproduct->slug])}}">{{$lproduct->name}}</a></h3>
                    <p class="mb-0">{{$lproduct->short_description}}</p>
                    @if($lproduct->sale_price > 0)
                    <span class="text-primary font-weight-bold"><del>${{$lproduct->regular_price}}</del></span>
                    <span class="text-primary font-weight-bold ml-3">${{$lproduct->sale_price}}</span>
                    @else
                    <p class="text-primary font-weight-bold">${{$lproduct->regular_price}}</p>
                    @endif
                  </div>
                </div>
              </div>
              @endif
              @endforeach
          </div>
        </div>
        </div>
      </div>
    </div>

    <div class="site-section block-8">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Big Sale!</h2>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 mb-5">
            <a href="#"><img src=" {{ asset ('images/blog_1.jpg')}}" alt="Image placeholder" class="img-fluid rounded"></a>
          </div>
          <div class="col-md-12 col-lg-5 text-center pl-md-5">
            <h2><a href="#">50% less in all items</a></h2>
            <p class="post-meta mb-4">By <a href="#">Carl Smith</a> <span class="block-8-sep">&bullet;</span> September 3, 2018</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam iste dolor accusantium facere corporis ipsum animi deleniti fugiat. Ex, veniam?</p>
            <p><a href="#" class="btn btn-primary btn-sm">Shop Now</a></p>
          </div>
        </div>
      </div>
    </div>
</div>
