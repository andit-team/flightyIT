@extends('admin.layout.app',['pageTitle' => __('Ticket Add')])
@section('content')

@component('admin.layout.inc.breadcrumb')
@slot('title')
{{ __('messages.my_pro_page') }}
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
                                    <th class="text-left">Status<i class="text-white">*</i></th>
                                    <th class="text-right">{{ __('messages.action')}}</th>
                                </tr>
                            </thead>
                            <tbody id="addSalesItem">
                                    <tr class="firstRow">
                                        <td>
                                            <input type="text"  name="first_name[]"  tabindex="-1" class="form-control mdate" placeholder="First Name" required autocomplete="off">
                                        </td>
                                        <td>
                                            <input type="text"  name="first_name[]"  tabindex="-1" class="form-control mdate" placeholder="First Name" required autocomplete="off">
                                        </td>
                                        <td>
                                            <input type="text"  name="first_name[]"  tabindex="-1" class="form-control mdate" placeholder="First Name" required autocomplete="off">
                                        </td>
                                        <td>
                                            <input type="text"  name="first_name[]"  tabindex="-1" class="form-control mdate" placeholder="First Name" required autocomplete="off">
                                        </td>
                                        <td>
                                            <input type="text"  name="first_name[]"  tabindex="-1" class="form-control mdate" placeholder="First Name" required autocomplete="off">
                                        </td>
                                        <td>
                                            <input type="text"  name="first_name[]"  tabindex="-1" class="form-control mdate" placeholder="First Name" required autocomplete="off">
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

        var a =  $('tr.firstRow:first');
        a = a.html()
        a = a.removeChild('.action')
        
        console.log(a)

        $('tbody#addSalesItem').append("<tr data-id="+rowNo+" id='row-"+rowNo+"' class='removableRow'>"+getTr.html()+"<td><span class='btn-sm btn-danger rowRemove'> <i class='fa fa-trash-o'></i></span></td></tr>");
        var defaultRow = $('tr.removableRow:last');
        $(".rowAdd").data("row",rowNo+1);
    });

    $(document).on("click", "span.rowRemove ", function () {
        $(this).closest("tr.removableRow").remove();
    });
</script>
@endpush