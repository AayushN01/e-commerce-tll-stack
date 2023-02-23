<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6 col-12">
                               Edit Category
                            </div>
                            <div class="col-md-6 col-12">
                                <a href="{{route('admin.category')}}" class="btn btn-success pull-right">All Categories</a>
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
                    <form action="#" class="form-horizontal" wire:submit.prevent="updateCategory();">

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Category Name <span class="text text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" name="name" placeholder="Category Name" required wire:model="name" wire:input="generateSlug();">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Category Slug</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-md" name="slug" wire:model="slug">
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
