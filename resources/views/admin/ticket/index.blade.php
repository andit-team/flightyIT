@extends('admin.layout.app',['pageTitle' => __('Search Ticket')])
@section('content')
@push('css')
    <style>
        
    </style>
@endpush
@include('elements.alert')
<div class="row mt-4">
    <div class="col-lg-12 col-md-12">
        <div class="card-header" style="background: url('http://dhillon.it/maan/images/headers3.jpg')">
            <h4><i class="fa fa-search"></i>&nbsp;&nbsp;Search Ticket</h4>
        </div>
        <div align="center">
        <fieldset style="border:solid #FFFFFF 1px; width:800px; ">
        <legend style="color: #CCCCCC;width: 15%;">Search Tickets</legend>
        <form action="" method="get">
          <table width="98%" border="0" align="center" cellpadding="4" cellspacing="0">
            <tbody><tr>
              <td width="11%" class="style6"><div align="right" class="style6">By Name:</div></td>
              <td width="32%"><div align="left">
                  <input name="byname" type="text" size="30" maxlength="30" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; border:solid #000000 1px" value="">
                </div></td>
              <td width="12%" class="style6"><div align="right">By Surname : </div></td>
              <td width="45%"><div align="left">
                  <input name="bysurname" type="text" size="30" maxlength="30" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; border:solid #000000 1px" value="">
                </div></td>
            </tr>
            <tr>
              <td class="style6"><div align="right" class="style6">By Date:</div></td>
              <td><div align="left">
                  <input onfocus="popUpCalendar(this, document.all.datefrom, 'yyyy-mm-dd', 0, 0)" name="datefrom" style="font-size:10px; font-family:Verdana; border:solid #000000 1px" size="12" maxlength="10" value="">
                  <input onfocus="popUpCalendar(this, document.all.dateto, 'yyyy-mm-dd', 0, 0)" name="dateto" style="font-size:10px; font-family:Verdana; border:solid #000000 1px" size="12" maxlength="10" value="">
                </div></td>
              <td class="style6"><div align="right">By Ticket no : </div></td>
              <td><div align="left">
                  <input name="byticketno" type="text" size="20" maxlength="20" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; border:solid #000000 1px" value="">
                </div></td>
            </tr>
            <tr>
              <td class="style6"><div align="right" class="style6">By PP no:</div></td>
              <td><div align="left">
                  <input name="byppno" type="text" size="20" value="" maxlength="20" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; border:solid #000000 1px">
                </div></td>
              <td class="style6"><div align="right">By Agent : </div></td>
              <td><div align="left">
                  	                  <select name="agent" style="font-size:10px; font-family:Verdana, Arial, Helvetica, sans-serif">
	                    <option value="">Select Agent</option>
	                    <option value="ww">Direct</option>
	                    <option value="aaaa">aaaa</option><option value="Admin">Admin</option><option value="admin1">admin1</option><option value="asdd">asdd</option><option value="dhaka">dhaka</option><option value="saiful">saiful</option><option value="saiful1">saiful1</option><option value="saiful2">saiful2</option>	                  </select>                 </div></td>
            </tr>
            <tr>
              <td class="style6"><div align="right">By Flight :</div></td>
              <td><div align="left">
                  <input name="byflight" type="text" size="10" value="" maxlength="10" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; border:solid #000000 1px">
                </div></td>
              <td class="style6"><div align="right">By Mobile No</div></td>
              <td><div align="left">
                  <input name="byphone" type="text" size="14" value="" maxlength="14" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; border:solid #000000 1px">
                </div></td>
            </tr>
            <tr>
              <td><p align="right" class="style6">Ticket :</p></td>
              <td><div align="left">
                  <input type="radio" name="tic" value="1">
                  <span class="style6"> OK
                  <input type="radio" name="tic" value="0">
                  Not Ok </span> <span class="style6">
                  <input type="radio" name="tic" value="" checked="checked">
                  All
                  </span></div></td>
              <td>&nbsp;
</td>
              <td>&nbsp;
</td>
            </tr>
            <tr>
              <td>&nbsp;
</td>
              <td><div align="left">
                  <input type="submit" name="submit" value=" Submit ">
                  <input type="reset" value=" Reset ">
                </div></td>
              <td>&nbsp;
</td>
              <td>&nbsp;
</td>
            </tr>
          </tbody></table>
        </form>
        </fieldset>
      </div>
        <div class="table-responsive mt-2">
        <table id="" class="table-bordered custom-tbl" cellspacing="0" width="100%">
            <thead>
                <tr class="themeThead">
                    <th width="50" class="text-center">{{ __('messages.sl') }}</th>
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
                    {{-- <th width='150'>{{ __('messages.action') }}</th> --}}
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;?>
                @foreach($tickets as $ticket)
                <tr>
                    <td class="text-center">{{sprintf("%02s",++$i) }}</td>
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
                    {{-- <td style="display: flex; justify-content: space-evenly;">
                        <button type="button" class="btn waves-effect waves-light btn-xs btn-info"><i class="fa fa-eye"></i></button>
                        <a class="btn waves-effect waves-light text-light btn-xs btn-warning" href="{{url('system-admin/users/'.$ticket->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                        <form action="{{url('system-admin/users/'.$ticket->id.'/delete')}}" method="post" style="margin-top:-2px" id="deleteButton{{$ticket->id}}">
                            @csrf
                            <button type="submit" class="btn waves-effect waves-light btn-xs btn-danger" onclick="sweetalertDelete({{$ticket->id}})"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
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
