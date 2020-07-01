@extends('admin.layout.app',['pageTitle' => __('Ticket Add')])
@section('content')

@include('elements.alert')
{{-- Add Ticket --}}
<div class="row mt-4">
    <div class="col-lg-12 col-md-12">
            <div class="card-header" style="background: url('http://dhillon.it/maan/images/headers3.jpg')">
                <h4><i class="fa fa-ticket"></i>&nbsp;&nbsp;Add Ticket</h4>
            </div>
            
            <?php $i = 1;?>
            <fieldset style="border:solid #FFFFFF 1px; width:99%; padding:4px">
                <legend style="color: #CCCCCC">Ticket Information</legend>
            
                <form class="form-material" action="{{ route('ticket.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive" style="margin-top: 10px">
                        <table class="table-striped table-bordered custom-tbl" id="purchaseTable">
                            <thead>
                                <tr class="themeThead" style="background-color: rgb(204, 255, 102);">
                                    <th class="text-center">First Name</th>
                                    <th class="text-center">Last Name</th>
                                    <th class="text-center">Departure</th>
                                    <th class="text-center">Return</th>
                                    <th class="text-center">From</th>
                                    <th class="text-center">To</th>
                                    <th class="text-center">Airline</th>
                                    <th class="text-center">Mobile</th>
                                    <th class="text-center">Passport</th>
                                    <th class="text-center">Ticket No.</th>
                                    <th class="text-center">Rate</th>
                                    <th class="text-center">Agent</th>
                                    <th class="text-center">{{ __('messages.action')}}</th>
                                </tr>
                            </thead>
                            <tbody id="addSalesItem">
                                    <tr class="firstRow">
                                        <td>
                                            <input type="text"  name="first_name[]"   class="text-center form-control" placeholder="first Name" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="last_name[]"   class="text-center form-control" placeholder="lirst Name" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="departure[]"   class="text-center form-control datepicker" value="{{date('d-m-Y')}}" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="return[]"   class="text-center form-control datepicker" value="{{date('d-m-Y')}}"  required >
                                        </td>
                                        <td>
                                            <input type="text"  name="from[]"   class="text-center form-control" placeholder="from" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="to[]"   class="text-center form-control" placeholder="to" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="airline[]"   class="text-center form-control" placeholder="airline" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="mobile[]"   class="text-center form-control" placeholder="mobile" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="passport[]"   class="text-center form-control" placeholder="passport number" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="ticket_no[]"   class="text-center form-control" placeholder="Ticket No." required >
                                        </td>
                                        <td>
                                            <input type="number"  name="rate[]"   class="text-center form-control" placeholder="rate" required >
                                        </td>
                                        <td>
                                        @if(Sentinel::inRole('admin'))
                                            <select class="form-control js-example-basic-single" tabindex="-1" name="agent[]"  required>
                                                <option value="" selected>--Select One--</option>
                                                @foreach ($agents as $agent)
                                                    <option value="{{  $agent->id }}">{{ $agent->name}}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select class="form-control js-example-basic-single" tabindex="-1" name="agent[]"  required>
                                                    <option selected value="{{ Sentinel::getUser()->id }}">{{ Sentinel::getUser()->first_name }}</option>
                                            </select>
                                        @endif

                                        </td>
                                        <td class="action">
                                            <span class="btn-sm btn-success btn add-row rowAdd" > <i class="fa fa-plus-square"></i></span>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" name="save" value ="savePrint" class="btn waves-effect waves-light btn-sm btn-success formSave mt-2" >Submit</button>
                    <button type="button"  class="btn waves-effect waves-light btn-sm btn-themecolor mt-2" onclick="window.reload()">Reset</button>
                </form>
            </fieldset>
    </div>
</div>

@endsection
@push('js')
<script>
    // inventories script
    $('.rowAdd').click(function(){

        var rowNo = parseFloat($(this).data("row"))||1;
        var getTr = $('tr.firstRow:first');

        $('tbody#addSalesItem').append("<tr data-id="+rowNo+" id='row-"+rowNo+"' class='removableRow'>"+getTr.html()+"<td><span class='btn-sm btn-danger rowRemove'> <i class='fa fa-trash-o'></i></span></td></tr>");
        var defaultRow = $('tr.removableRow:last');
        $(".rowAdd").data("row",rowNo+1);
        $('#row-'+rowNo+' > td.action ').css({'display':'none'});

        $('.datepicker').datepicker({
            startDate: '-0d',
            format:"dd-mm-yyyy",
            autoclose: true,
            todayHighlight: true,
        });
    });

    $(document).on("click", "span.rowRemove ", function () {
        $(this).closest("tr.removableRow").remove();
    });
</script>
@endpush