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
                                All Products
                            </div>
                            <div class="col-md-6 col-12">
                                <a href="{{route('admin.add_product')}}" class="btn btn-success pull-right">Add New Product</a>
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
                                <th>Name</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                            <tr>
                                <td>{{++$key}}</td>
                                <td class="text-capitalize">{{$product->name}}</td>
                                <td><img src="{{asset('assets/images/products')}}/{{$product->featured_image}}" alt="{{$product->name}}" height="50" width="50"></td>
                                <td class="text-capitalize">{{$product->category->name}}</td>
                                <td>{{$product->SKU}}</td>
                                <td>{{$product->regular_price}}</td>
                                <td>{{$product->stock_status == 'instock' ? 'In Stock' : 'Out of Stock'}} </td>
                                <td><a href="{{route('admin.edit_product',$product->slug)}}" class="btn btn-warning">Edit</a>
                                    <a href="#" class="btn btn-danger" wire:click.prevent="deleteProduct({{$product->id}});">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
