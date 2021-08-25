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
                                <label class="lead">Add New Product</label> 
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-primary btn-sm float-right">All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="">
                        <form class="col-md-12 mt-3 mb-3" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                            <div class="form-group">
                            <label class="lead">Product Name</label>
                            <input type="text" class="form-control input-md" placeholder="Product Name" wire:model="name" wire:keyup="generateSlug"/>
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label class="lead">Product Slug</label>
                                <input type="text" class="form-control input-md" placeholder="Product Slug" wire:model="slug"/>
                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label class="lead">Short Description</label>
                                <textarea class="form-control input-md" placeholder="Short Description" wire:model="short_description"/></textarea>
                                @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label class="lead">Description</label>
                                <textarea class="form-control input-md" placeholder="Description" wire:model="description"/></textarea>
                                @error('description') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label class="lead">Regular Price</label>
                                <input type="text" class="form-control input-md" placeholder="Regular Price" wire:model="regular_price"/>
                                @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label class="lead">Sale Price</label>
                                <input type="text" value="0" class="form-control input-md" placeholder="Sale Price" wire:model="sale_price"/>
                                @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label class="lead">SKU</label>
                                <input type="text" class="form-control input-md" placeholder="SKU" wire:model="SKU"/>
                                @error('SKU') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label class="lead">Stock</label>
                                <select class="form-control" wire:model="stock_status">
                                    <option value="instock">InStock</option>
                                    <option value="outofstock">Out Of Stock</option>
                                </select>
                                @error('stock_status') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label class="lead">Featured</label>
                                <select class="form-control" wire:model="featured">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="lead">Quantity</label>
                                <input type="text" class="form-control input-md" placeholder="Quantity" wire:model="quantity"/>
                                @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label class="lead">Product Image</label>
                                <input type="file" class="input-file form-control" wire:model="image"/>
                                @if($image)
                                   <img src="{{$image->temporaryUrl()}}" width="120"/>
                                @endif
                                @error('image') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label class="lead">Category</label>
                                <select class="form-control" wire:model="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary float-center">Add</button>
                            </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
