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
                                Sale Settings
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('success_msg'))
                        <div class="alert alert-success">{{Session::get('success_msg')}}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="updateSaleSetting();">
                            <div class="form-group">
                                <label for="status" class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select name="status" id="status" class="form-control input-md" wire:model="status">
                                        <option value="0" selected>Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-md-4 control-label">Sale Date</label>
                                <div class="col-md-4">
                                    <input type="text" name="sale_date" id="sale-date" class="form-control input-md" placeholder="YYYY-MM-DD H:M:S" wire:model="sale_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="button" class="col-md-4 control-label"></label>

                                <div class="col-md-4">
                                    <button class="btn btn-primary" type="submit">Save</button>
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
           $(document).ready(function(){
                $("#sale-date").datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss',
                }).on('dp.change',function(ev){
                    var data = $('#sale-date').val();
                    @this.set('sale_date',data);
                });
            });

    </script>
@endpush
