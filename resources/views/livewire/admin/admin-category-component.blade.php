<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                All Categories
                            </div>
                            <div class="col-md-6 col-12">
                                <a href="{{route('admin.add_category')}}" class="btn btn-success pull-right">Add New Category</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    @if(Session::has('success_msg'))
                        <div class="alert alert-success">{{Session::get('success_msg')}}</div>
                    @endif
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td><a href="{{route('admin.edit_category',$category->slug)}}" class="btn btn-warning">Edit</a>
                                    <a href="#" class="btn btn-danger" wire:click.prevent="deleteCategory({{$category->id}});">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
