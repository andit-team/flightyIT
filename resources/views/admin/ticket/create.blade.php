@extends('admin.layout.app',['pageTitle' => __('Ticket Add')])
@section('content')

@component('admin.layout.inc.breadcrumb')
@slot('title')
Add New Ticket
@endslot
@endcomponent
@include('elements.alert')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card border-dark">
            <div class="card-header bg-dark">
                <h4 class="card-title text-white"><i class="fa fa-ticket"></i>&nbsp;&nbsp;Add Ticket</h4>
                <h6 class="card-subtitle">New Ticket add Form</h6>
            </div>
            <?php $i = 1;?>
            <div class="card-body">
                <form class="form-material" action="{{ route('ticket.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive" style="margin-top: 10px">
                        <table class="table table-bordered table-hover purchaseTable" id="purchaseTable">
                            <thead>
                                <tr class="themeThead">
                                    <th class="text-left">First Name<i class="text-white">*</i></th>
                                    <th class="text-left">Last Name<i class="text-white">*</i></th>
                                    <th class="text-left">Departure<i class="text-white">*</i></th>
                                    <th class="text-left">Return<i class="text-white">*</i></th>
                                    <th class="text-left">From<i class="text-white">*</i></th>
                                    <th class="text-left">To<i class="text-white">*</i></th>
                                    <th class="text-left">Airline<i class="text-white">*</i></th>
                                    <th class="text-left">Mobile<i class="text-white">*</i></th>
                                    <th class="text-left">Passport<i class="text-white">*</i></th>
                                    <th class="text-left">Ticket No.<i class="text-white">*</i></th>
                                    <th class="text-left">Rate<i class="text-white">*</i></th>
                                    <th class="text-left">Agent<i class="text-white">*</i></th>
                                    <th class="text-right">{{ __('messages.action')}}</th>
                                </tr>
                            </thead>
                            <tbody id="addSalesItem">
                                    <tr class="firstRow">
                                        <td>
                                            <input type="text"  name="first_name[]"   class="form-control" placeholder="first Name" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="last_name[]"   class="form-control" placeholder="lirst Name" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="departure[]"   class="form-control datepicker" value="{{date('d-m-Y')}}" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="return[]"   class="form-control datepicker" value="{{date('d-m-Y')}}"  required >
                                        </td>
                                        <td>
                                            <input type="text"  name="from[]"   class="form-control" placeholder="from" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="to[]"   class="form-control" placeholder="to" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="airline[]"   class="form-control" placeholder="airline" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="mobile[]"   class="form-control" placeholder="mobile" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="passport[]"   class="form-control" placeholder="passport number" required >
                                        </td>
                                        <td>
                                            <input type="text"  name="ticket_no[]"   class="form-control" placeholder="Ticket No." required >
                                        </td>
                                        <td>
                                            <input type="number"  name="rate[]"   class="form-control" placeholder="rate" required >
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
                                            <input type="text" readonly class="form-control" value="{{ Sentinel::getUser()->name }}">
                                        @endif

                                        </td>
                                        <td class="action">
                                            <span class="btn-sm btn-success btn add-row rowAdd" > <i class="fa fa-plus-square"></i></span>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" name="save" value ="savePrint" class="btn waves-effect waves-light btn-lg btn-themecolor float-right formSave" style="margin-right:75px"> <i class="mdi mdi-printer"></i> {{ __('messages.save_print')}}</button>
                </form>
            </div>
        </div>
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