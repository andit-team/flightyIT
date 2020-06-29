@extends('admin.layout.app',['pageTitle' => __('Search Ticket')])
@section('content')

@include('elements.alert')
<div class="row mt-4">
    <div class="col-lg-12 col-md-12">
        <div class="card border-dark">
            <div class="card-header bg-dark">
                <h4 class="card-title text-white"><i class="fa fa-search"></i>&nbsp;&nbsp; Search Tickets</h4>
            </div>
            <div class="card-body">
                {{-- Search --}}
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <form action="" method="get" class="form-inline float-right search">
                                <div class="form-group">
                                    <label for="text">{{ __('messages.date_from') }}</label>
                                    <input type="text" name="start" value="{{date('Y-m-d')}}" class="form-control datepickerDB">
                                </div>
                                <div class="form-group">
                                    <label for="text">{{ __('messages.date_to') }}</label>
                                    <input type="text" name="end" value="{{ date('Y-m-d')}}" class="form-control datepickerDB">
                                </div>
                                <div class="form-group">
                                    <button class="btn search-btn"><i class="fa fa-search"></i></button>
                                    <a class="btn search-btn-reset" href="{{url('reports/income-statement')}}"><i class="fa fa-refresh"></i></a>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr class="themeThead">
                                <th width="80">{{ __('messages.sl') }}</th>
                                <th>Name</th>
                                <th>Departure</th>
                                <th>Return</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Airline</th>
                                <th>Mobile</th>
                                <th>Passport</th>
                                <th>Ticket</th>
                                <th>Rate</th>
                                <th>Agent</th>
                                <th>Status</th>
                                <th width='150'>{{ __('messages.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            @foreach($tickets as $ticket)
                            <tr>
                                <td>{{sprintf("%02s",++$i) }}</td>
                                <td>{{$ticket->fname." ".$ticket->lname}}</td>
                                <td>{{$ticket->departure}}</td>
                                <td>{{$ticket->return}}</td>
                                <td>{{$ticket->from}}</td>
                                <td>{{$ticket->to}}</td>
                                <td>{{$ticket->airline}}</td>
                                <td>{{$ticket->mobile}}</td>
                                <td>{{$ticket->passport}}</td>
                                <td>{{$ticket->ticket_no}}</td>
                                <td>{{$ticket->rate}}</td>
                                <td>{{$ticket->agent}}</td>
                                <td>{{$ticket->status}}</td>
                                <td style="display: flex; justify-content: space-evenly;">
                                    <button type="button" class="btn waves-effect waves-light btn-xs btn-info"><i class="fa fa-eye"></i></button>
                                    <a class="btn waves-effect waves-light text-light btn-xs btn-warning" href="{{url('system-admin/users/'.$ticket->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                                    <form action="{{url('system-admin/users/'.$ticket->id.'/delete')}}" method="post" style="margin-top:-2px" id="deleteButton{{$ticket->id}}">
                                        @csrf
                                        <button type="submit" class="btn waves-effect waves-light btn-xs btn-danger" onclick="sweetalertDelete({{$ticket->id}})"><i class="fa fa-trash-o"></i></button>
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
