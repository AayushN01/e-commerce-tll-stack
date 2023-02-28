<div>
    <div class="container" style="padding: 30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manage Home Categories
                    </div>
                    <div class="panel-body">
                        @if(Session::has('success_msg'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success_msg')}}
                        </div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="updateHomeCategory();">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Choose Categories</label>
                                <div class="col-md-4" wire:ignore>
                                    <select name="categories[]" id="category" class="sel_categories form-control" multiple="multiple" wire:model="selected_categories">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">No of Products</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" name="no_of_products" wire:model="no_of_products">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
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
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $('#category').select2();
        $('#category').on('change',function(e){
            var data = $('#category').select2('val');
            $(this).set('selected_categories',data);
        });
    });
</script>
@endpush
