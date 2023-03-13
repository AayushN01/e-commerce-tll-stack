<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                Add a New Slider
                            </div>
                            <div class="col-md-6 col-12">
                                <a href="{{route('admin.sliders')}}" class="btn btn-success pull-right">All Sliders</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="panel-body table-responsive">
                    @if(Session::has('success_msg'))
                    <div class="alert alert-success">
                        {{Session::get('success_msg')}}
                    </div>
                    @endif
                    <form action="#" class="form-horizontal" wire:submit.prevent="storeSlider();">

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name <span class="text text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" name="name" placeholder="Name" wire:model.lazy="name">
                                @error('name')
                                    <p class="text text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="short_description" class="col-md-4 control-label">Caption</label>
                            <div class="col-md-4">
                                <textarea name="caption" id="caption" class="form-control input-md" wire:model.lazy="caption"></textarea>
                                @error('caption')
                                <p class="text text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Price</label>
                            <div class="col-md-4">
                                <input type="number" class="form-control input-md" name="price" wire:model.lazy="price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-md-4 control-label">Link</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" name="link" wire:model.lazy="link">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stock_status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-4">
                                <select name="status" id="status" class="form-control input-md" wire:model="status">
                                    <option value="0" selected>Draft</option>
                                    <option value="1">Published</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="featured_image" class="col-md-4 control-label">Featured Image</label>
                            <div class="col-md-4">
                                <input type="file" class="form-control input-file" name="image" wire:model="image">
                                @if(isset($image))
                                <img src="{{$image->temporaryUrl()}}" alt="" width="120">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
