<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                Add a New Product
                            </div>
                            <div class="col-md-6 col-12">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">All Products</a>
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
                    <form action="#" class="form-horizontal" wire:submit.prevent="storeProduct()">

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Product Name <span class="text text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" name="name" placeholder="Category Name" required wire:model="name" wire:input="generateSlug();">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Product Slug</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" name="slug" wire:model="slug">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-md-4 control-label">Category <span class="text text-danger">*</span></label>
                            <div class="col-md-4">
                                <select name="category_id" id="category_id" class="form-control input-md" required wire:model="category_id">
                                    <option selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sku" class="col-md-4 control-label">SKU</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" name="SKU" wire:model="SKU">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="short_description" class="col-md-4 control-label">Short Description</label>
                            <div class="col-md-4">
                                <textarea name="short_description" id="short_description" class="form-control input-md" wire:model="short_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-4">
                                <textarea name="description" id="description" class="form-control input-md" wire:model="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="regular_price" class="col-md-4 control-label">Regular Price <span class="text text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="number" class="form-control input-md" name="regular_price" required wire:model="regular_price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="regular_price" class="col-md-4 control-label">Sale Price</label>
                            <div class="col-md-4">
                                <input type="number" class="form-control input-md" name="sale_price" wire:model="sale_price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-4">
                                <input type="number" class="form-control input-md" name="quantity" wire:model="quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stock_status" class="col-md-4 control-label">Stock Status</label>
                            <div class="col-md-4">
                                <select name="stock_status" id="stock_status" class="form-control input-md" wire:model="stock_staus">
                                    <option value="instock" selected>In Stock</option>
                                    <option value="outofstock">Out of Stock</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stock_status" class="col-md-4 control-label">Featured</label>
                            <div class="col-md-4">
                                <select name="featured" id="featured" class="form-control input-md" wire:model="featured">
                                    <option value="0" selected>No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="featured_image" class="col-md-4 control-label">Featured Image</label>
                            <div class="col-md-4">
                                <input type="file" class="form-control input-file" name="featured_image" wire:model="featured_image">
                                @if($featured_image)
                                <img src="{{$featured_image->temporaryUrl()}}" alt="" width="120">
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
