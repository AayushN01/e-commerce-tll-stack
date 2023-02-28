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
                                All Sliders
                            </div>
                            <div class="col-md-6 col-12">
                                <a href="{{route('admin.add_slider')}}" class="btn btn-success pull-right">Add New Slider</a>
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
                                <th>Caption</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $key => $slider)
                            <tr>
                                <td>{{++$key}}</td>
                                <td class="text-capitalize">{{$slider->title}}</td>
                                <td class="text-capitalize">{{$slider->caption}}</td>
                                <td>{{$slider->price}}</td>
                                <td><img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" alt="{{$slider->name}}" height="50" width="50"></td>
                                <td>{{$slider->status == 1 ? 'Published' : 'Draft'}}</td>
                                <td><a href="{{route('admin.edit_slider',$slider->id)}}" class="btn btn-warning">Edit</a>
                                    <a href="#" class="btn btn-danger" wire:click.prevent="deleteslider({{$slider->id}});">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{$sliders->links()}} --}}
                </div>
            </div>
        </div>
    </div>
</div>
