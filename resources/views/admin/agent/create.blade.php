@extends('admin.layout.app',['pageTitle' => __('New Agent')])
@section('content')


@include('elements.alert')
<div class="row">
    <div class="col-md-4 col-sm-12 mt-4">
        {{-- Form --}}
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mx-auto">
                <div class="card border-dark">
                    <div class="card-header bg-dark">
                        <h4 class="card-title text-white"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Agent</h4>
                    </div>
                    <div class="card-body">
                        
                        <form class="form-material mt-4 form mx-auto" action="{{url('system-admin/users/store')}}" method="post" autocomplete="off">
                            @csrf
                            {{-- fname, lname --}}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('first_name]') ? ' has-danger' : '' }}">
                                        <label for="first_name" class="form-control-label">First Name:</label>
                                        <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control" id="first_name" placeholder="first_name">
                                            @include('elements.feedback',['field' => 'first_name'])
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                        <label for="last_name" class="form-control-label">Last Name:</label>
                                        <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control" id="last_name" placeholder="last_name">
                                            @include('elements.feedback',['field' => 'last_name'])
                                    </div>
                                </div>
                            </div>

                            {{-- phone, agency --}}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('phone]') ? ' has-danger' : '' }}">
                                        <label for="phone" class="form-control-label">Phone:</label>
                                        <input type="number" name="phone" value="{{old('phone')}}" class="form-control" id="phone" placeholder="Phone">
                                            @include('elements.feedback',['field' => 'phone'])
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('agency') ? ' has-danger' : '' }}">
                                        <label for="agency" class="form-control-label">Agency:</label>
                                        <input type="text" name="agency" value="{{old('agency')}}" class="form-control" id="agency" placeholder="agency">
                                            @include('elements.feedback',['field' => 'agency'])
                                    </div>
                                </div>
                            </div>

                            {{-- role --}}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group {{ $errors->has('role') ? ' has-danger' : '' }}">
                                        <label for="role" class="form-control-label">{{ __('messages.role') }}<sup class="text-danger font-bold">*</sup> :</label>
                                        <select class="form-control" id="role" name="role" required>
                                            <?php echo Core::roleOptions($roles,'client')?>
                                        </select>
                                        @include('elements.feedback',['field' => 'role'])
                                    </div>
                                </div>
                            </div>

                            {{-- email, Password --}}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label for="email" class="form-control-label">Email:</label>
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Email" required>
                                            @include('elements.feedback',['field' => 'email'])
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label for="[password]" class="form-control-label">Password:</label>
                                        <input type="password" name="[password]" value="{{old('[password]')}}" class="form-control" id="password" required>
                                            @include('elements.feedback',['field' => '[password]'])
                                    </div>
                                </div>
                            </div>

                            <div class="form-group m-b-0">
                                <button type="submit" class="btn btn-themecolor btn-md waves-effect float-right waves-light m-t-10">{{ __('messages.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-12 mt-4">
        {{-- List Table --}}
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card border-dark">
                    <div class="card-header bg-dark">
                        <h4 class="card-title text-white"><i class="fa fa-users"></i>&nbsp;&nbsp;Agent List</h4>
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
                                        <th>{{ __('messages.last_login') }}</th>
                                        <th width='150'>{{ __('messages.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;?>
                                    @foreach($agents as $user)
                                    <tr>
                                        <td>{{sprintf("%02s",++$i) }}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td><?php echo Core::globalDateTime($user->last_login)?></td>
                                        <td style="display: flex; justify-content: space-evenly;">
                                            <button type="button" class="btn waves-effect waves-light btn-xs btn-info"><i class="fa fa-eye"></i></button>
                                            <a class="btn waves-effect waves-light text-light btn-xs btn-warning" href="{{url('system-admin/users/'.$user->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                                            <form action="{{url('system-admin/users/'.$user->id.'/delete')}}" method="post" style="margin-top:-2px" id="deleteButton{{$user->id}}">
                                                @csrf
                                                <button type="submit" class="btn waves-effect waves-light btn-xs btn-danger" onclick="sweetalertDelete({{$user->id}})"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
