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
                                <label class="lead">Add New Slide</label> 
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.homeslider')}}" class="btn btn-primary btn-sm float-right">All Slides</a>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="">
                        <form class="col-md-12 mt-3 mb-3" enctype="multipart/form-data" wire:submit.prevent="addSlide">
                            <div class="form-group">
                                <label class="lead">Title</label>
                                <input type="text" value=" " class="form-control input-md" placeholder="Title" wire:model="title"/>
                            </div>
                            
                            <div class="form-group">
                                <label class="lead">Subtitle</label>
                                <input type="text" value=" " class="form-control input-md" placeholder="Subtitle" wire:model="subtitle"/>
                            </div>

                            <div class="form-group">
                                <label class="lead">Price</label>
                                <input type="text" value=" " class="form-control input-md" placeholder="Price" wire:model="price"/>
                            </div>

                            <div class="form-group">
                                <label class="lead">Link</label>
                                <input type="text" class="form-control input-md" placeholder="Link" wire:model="link"/>
                            </div>

                            <div class="form-group">
                                <label class="lead">Image</label>
                                <input type="file" class="input-file form-control" wire:model="image"/>
                                @if($image)
                                   <img src="{{$image->temporaryUrl()}}" width="120">
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="lead">Status</label>
                                <select class="form-control" wire:model="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary float-center">Submit</button>
                            </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

