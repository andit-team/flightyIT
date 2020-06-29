@extends('admin.layout.app',['pageTitle' => 'Agency'])
@section('content')

@include('elements.alert')
<div class="row">
    <div class="col-lg-10 col-md-10 mx-auto">
        <form class="form-material mt-4 form" action="{{ route('agency.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="card">
                <div class="card-header bg-dark">
                    <h4 class="mb-0 text-white"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Agency</h4></div>
                <div class="card-body">
                    <h4 class="text-muted"><i class="fa fa-cubes"></i> Basic Info</h4>
                    <hr class="bg-gray">
                    <div class="row">
                        {{-- Agency name --}}
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label for="name" class="form-control-label">Agency Name:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Enter name here" required>
                                @include('elements.feedback',['field' => 'name'])
                            </div>
                        </div>
                        {{-- alias --}}
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group {{ $errors->has('alias') ? ' has-danger' : '' }}">
                                <label for="alias" class="form-control-label">Agency alias:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="text" name="alias" value="{{old('alias')}}" class="form-control" id="alias" placeholder="Enter alias here" required>
                                @include('elements.feedback',['field' => 'alias'])
                            </div>
                        </div>
                        {{-- code --}}
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group {{ $errors->has('code') ? ' has-danger' : '' }}">
                                <label for="code" class="form-control-label">Agency Code:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="text" name="code" value="{{old('code')}}" class="form-control" id="code" placeholder="Enter code here" required>
                                @include('elements.feedback',['field' => 'code'])
                            </div>
                        </div>
                        {{-- vat --}}
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group {{ $errors->has('vat') ? ' has-danger' : '' }}">
                                <label for="vat" class="form-control-label">Vat REG No.:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="text" name="vat" value="{{old('vat')}}" class="form-control" id="vat" placeholder="Enter vat no. here" required>
                                @include('elements.feedback',['field' => 'vat'])
                            </div>
                        </div>
                        {{-- address --}}
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group {{ $errors->has('address') ? ' has-danger' : '' }}">
                                <label for="address" class="form-control-label">Address:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="text" name="address" value="{{old('address')}}" class="form-control" id="address" placeholder="Enter address" required>
                                @include('elements.feedback',['field' => 'address'])
                            </div>
                        </div>
                        {{-- phone --}}
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                                <label for="phone" class="form-control-label">Phone number:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="number" name="phone" value="{{old('phone')}}" class="form-control" id="phone" placeholder="Enter phone no. here" required>
                                @include('elements.feedback',['field' => 'phone'])
                            </div>
                        </div>
                        {{-- mobile --}}
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group {{ $errors->has('mobile') ? ' has-danger' : '' }}">
                                <label for="mobile" class="form-control-label">Mobile:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="text" name="mobile" value="{{old('phone')}}" class="form-control" id="mobile" placeholder="Enter mobile no. here" required>
                                @include('elements.feedback',['field' => 'mobile'])
                            </div>
                        </div>
                        {{-- email --}}
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label for="email" class="form-control-label">Email:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="text" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Enter email no. here" required>
                                @include('elements.feedback',['field' => 'email'])
                            </div>
                        </div>
                    </div>
                    <h4 class="text-muted"><i class="fa fa-cubes"></i> Validity & Credit</h4>
                    <hr class="bg-gray">
                    <div class="row">
                        {{-- Agency Validity --}}
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group {{ $errors->has('validity') ? ' has-danger' : '' }}">
                                <label for="validity" class="form-control-label">Agency validity:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="date" name="validity" value="{{old('validity')}}" class="form-control" id="validity" required>
                                @include('elements.feedback',['field' => 'validity'])
                            </div>
                        </div>
                        {{-- Type --}}
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group {{ $errors->has('type') ? ' has-danger' : '' }}">
                                <label for="type" class="form-control-label">Agency type:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="text" name="type" value="{{old('type')}}" class="form-control" id="type" placeholder="Enter type here" required>
                                @include('elements.feedback',['field' => 'type'])
                            </div>
                        </div>
                        {{-- Credit --}}
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group {{ $errors->has('credit') ? ' has-danger' : '' }}">
                                <label for="credit" class="form-control-label">Credit:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="text" name="credit" value="{{old('credit')}}" class="form-control" id="credit" placeholder="Enter Credit here" required>
                                @include('elements.feedback',['field' => 'credit'])
                            </div>
                        </div>
                        {{-- limit --}}
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group {{ $errors->has('credit_limit') ? ' has-danger' : '' }}">
                                <label for="credit_limit" class="form-control-label">Credit limit:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="text" name="credit_limit" value="{{old('credit_limit')}}" class="form-control" id="credit_limit" placeholder="Credit Limit" required>
                                @include('elements.feedback',['field' => 'credit_limit'])
                            </div>
                        </div>
                        {{-- note --}}
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group {{ $errors->has('note') ? ' has-danger' : '' }}">
                                <label for="note" class="form-control-label">Note:<sup class="text-danger font-bold">*</sup> :</label>
                                <textarea type="text" name="note" value="{{old('note')}}" class="form-control" id="note" placeholder="Enter note" required></textarea>
                                @include('elements.feedback',['field' => 'note'])
                            </div>
                        </div>
                    </div>
                    <h4 class="text-muted"><i class="fa fa-cubes"></i> Others</h4>
                    <hr class="bg-gray">
                    <div class="row">
                        {{-- gds --}}
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group {{ $errors->has('gds_id') ? ' has-danger' : '' }}">
                                <label for="gds_id" class="form-control-label">Agency GDS ID:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="text" name="gds_id" value="{{old('gds_id')}}" class="form-control" id="gds_id" placeholder="Enter gds_id here" required>
                                @include('elements.feedback',['field' => 'gds_id'])
                            </div>
                        </div>
                        {{-- start --}}
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group {{ $errors->has('start_date') ? ' has-danger' : '' }}">
                                <label for="start_date" class="form-control-label">Start Date:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="date" name="start_date" value="{{old('start_date')}}" class="form-control" id="start_date" required>
                                @include('elements.feedback',['field' => 'start_date'])
                            </div>
                        </div>
                        {{-- end --}}
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group {{ $errors->has('end_date') ? ' has-danger' : '' }}">
                                <label for="end_date" class="form-control-label">End Date:<sup class="text-danger font-bold">*</sup> :</label>
                                <input type="date" name="end_date" value="{{old('end_date')}}" class="form-control" id="end_date" required>
                                @include('elements.feedback',['field' => 'end_date'])
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <button type="submit" class="btn btn-themecolor btn-md waves-effect float-right waves-light m-t-10">{{ __('messages.save') }}</button>
                    </div>
                </div>
            </div>
        </form>    
    </div>
</div>
{{-- List Table --}}
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card border-dark">
            <div class="card-header bg-dark">
                <h4 class="card-title text-white"><i class="fa fa-users"></i>&nbsp;&nbsp;Agency List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr class="themeThead">
                                <th width="80">{{ __('messages.sl') }}</th>
                                <th>{{ __('messages.name') }}</th>
                                <th>{{ __('messages.email') }}</th>
                                <th>{{ __('messages.phone') }}</th>
                                <th width='150'>{{ __('messages.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<!-- This is data table -->
<script src="{{ asset('material') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="{{ asset('js') }}/dataTables.buttons.min.js"></script>
<script src="{{ asset('js') }}/buttons.flash.min.js"></script>
<script src="{{ asset('js') }}/jszip.min.js"></script>
<script src="{{ asset('js') }}/pdfmake.min.js"></script>
<script src="{{ asset('js') }}/vfs_fonts.js"></script>
<script src="{{ asset('js') }}/buttons.html5.min.js"></script>
<script src="{{ asset('js') }}/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
                $('#myTable').DataTable();
                $(document).ready(function() {
                    var table = $('#example').DataTable({
                        "columnDefs": [{
                            "visible": false,
                            "targets": 2
                        }],
                        "order": [
                            [2, 'asc']
                        ],
                        "displayLength": 25,
                        "drawCallback": function(settings) {
                            var api = this.api();
                            var rows = api.rows({
                                page: 'current'
                            }).nodes();
                            var last = null;
                            api.column(2, {
                                page: 'current'
                            }).data().each(function(group, i) {
                                if (last !== group) {
                                    $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                    last = group;
                                }
                            });
                        }
                    });
                    // Order by the grouping
                    $('#example tbody').on('click', 'tr.group', function() {
                        var currentOrder = table.order()[0];
                        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                            table.order([2, 'desc']).draw();
                        } else {
                            table.order([2, 'asc']).draw();
                        }
                    });
                });
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
</script>
@endpush
@endsection