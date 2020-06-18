@extends('admin.layout.app',['pageTitle' => __('User Management')])
@section('content')

{{-- @component('admin.layout.inc.breadcrumb')
@slot('title')
{{ __('messages.users') }}
@endslot
@endcomponent --}}
@include('elements.alert')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card mt-3">
            <div class="card-body">
                <h4 class="card-title">Tickets</h4>
                <h6 class="card-subtitle">Ticket Stock}</h6>
                <hr class="hr-borderd">
                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="80">Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Phone</th>
                                <th width='150'>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td>No Data</td>
                            </tr>
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


@endpush
@endsection
