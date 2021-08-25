<a href="/shop">Categories</a>
<ul class="dropdown">
  @foreach($categories as $category)  
  <li><a href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}</a></li>
  @endforeach
</ul>
