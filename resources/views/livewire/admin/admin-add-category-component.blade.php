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
                                <label class="lead">Add New Category</label> 
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.categories')}}" class="btn btn-primary btn-sm float-right">All categories</a>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="">
                        <form class="col-md-12 mt-3 mb-3" wire:submit.prevent="storeCategory">
                            <div class="form-group">
                            <label class="lead">Category Name</label>
                            <input type="text" class="form-control input-md" placeholder="Name" wire:model="name" wire:keyup="generateslug"/>
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group">
                            <label class="lead">Category Slug</label>
                            <input type="text" class="form-control input-md" placeholder="Slug" wire:model="slug"/>
                            @error('slug') <p class="text-danger">{{$message}}</p> @enderror
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
