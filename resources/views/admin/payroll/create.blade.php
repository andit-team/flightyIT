@extends('admin.layout.app',['pageTitle' => 'New Payroll','noFooter' => 'true'])
@section('content')

{{-- @component('admin.layout.inc.breadcrumb')
@slot('title')
New Payroll
@endslot
@endcomponent --}}
@include('elements.alert')
<div class="row">
    <div class="col-lg-12 col-md-12 m-t-30">
        <form class="form-material m-t-40 form" action="{{ route('payroll.store') }}" method="post">
            @csrf
            <div class="col-md-7 d-inline-block">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Employee</h4>
                        <div class="form-group row {{ $errors->has('emp_name') ? ' has-danger' : '' }}">
                            <label for="emp_name" class="col-sm-3 text-right control-label col-form-label">Emp Name <sup class="text-danger font-bold">*</sup> :</label>
                            <div class="col-sm-9">
                                <input type="text" name="emp_name" value="{{old('emp_name')}}" class="form-control" id="emp_name" placeholder="Name of employee"  autocomplete="off">
                                @include('elements.feedback',['field' => 'emp_name'])
                            </div>
                        </div>   
                        <div class="form-group row {{ $errors->has('emp_designation') ? ' has-danger' : '' }}">
                            <label for="emp_designation" class="col-sm-3 text-right control-label col-form-label">Designation <sup class="text-danger font-bold">*</sup> :</label>
                            <div class="col-sm-9">
                                <input type="text" name="emp_designation" value="{{old('emp_designation')}}" class="form-control" id="emp_designation" placeholder="Designation"  autocomplete="off">
                                @include('elements.feedback',['field' => 'emp_designation'])
                            </div>
                        </div>   
                        <div class="form-group row {{ $errors->has('extension') ? ' has-danger' : '' }}">
                            <label for="extension" class="col-sm-3 text-right control-label col-form-label">Extension <sup class="text-danger font-bold">*</sup> :</label>
                            <div class="col-sm-9">
                                <input type="text" name="extension" value="{{old('extension')}}" class="form-control datepickerDB" id="extension" placeholder="Extension"  autocomplete="off">
                                @include('elements.feedback',['field' => 'extension'])
                            </div>
                        </div>   
                        <div class="form-group row {{ $errors->has('joining_date') ? ' has-danger' : '' }}">
                            <label for="joining_date" class="col-sm-3 text-right control-label col-form-label">Joining Date <sup class="text-danger font-bold">*</sup> :</label>
                            <div class="col-sm-9">
                                <input type="text" name="joining_date" value="{{old('joining_date')}}" class="form-control datepickerDB" id="joining_date" placeholder="Joining Date"  autocomplete="off">
                                @include('elements.feedback',['field' => 'joining_date'])
                            </div>
                        </div>   
                        <div class="form-group row {{ $errors->has('employment') ? ' has-danger' : '' }}">
                            <label for="employment" class="col-sm-3 text-right control-label col-form-label">Joining Date <sup class="text-danger font-bold">*</sup> :</label>
                            <div class="col-sm-9">
                                <select name="year" class="form-control" id="year">
                                    {!!Core::getOptionArray(['Regular' => 'Regular','FTE' => 'FTE'])!!}
                                </select>
                                @include('elements.feedback',['field' => 'employment'])
                            </div>
                        </div> 
                    </div>
                </div> 
        
                <div class="card">
                     <div class="card-body">
                        <h4 class="card-title">Payroll</h4>
                        <div class="form-group row {{ $errors->has('financial_year') ? ' has-danger' : '' }}">
                            <label for="financial_year" class="col-sm-3 text-right control-label col-form-label">Financial Year <sup class="text-danger font-bold">*</sup> :</label>
                            <div class="col-sm-9">
                                <select name="financial_year" class="form-control" id="financial_year">
                                    {!!Core::getOptionArray(['2018-2019' => '2018-2019','2019-2020' => '2019-2020','2020-2021' => '2020-2021'])!!}
                                </select>
                                @include('elements.feedback',['field' => 'financial_year'])
                            </div>
                        </div>   
                        <div class="form-group row {{ $errors->has('year') ? ' has-danger' : '' }}">
                            <label for="year" class="col-sm-3 text-right control-label col-form-label">Year <sup class="text-danger font-bold">*</sup> :</label>
                            <div class="col-sm-4">
                                <select name="year" class="form-control" id="year">
                                    {!!Core::getOptionArray(['2019' => '2019','2020' => '2020','2021' => '2021'])!!}
                                </select>
                                @include('elements.feedback',['field' => 'year'])
                            </div>
                            <div class="col-sm-5">
                                <select name="month" class="form-control" id="month">
                                    {!!Core::getOptionArray(
                                        [
                                            'January'  => 'January',
                                            'February' => 'February',
                                            'March'    => 'March',
                                            'April'    => 'April',
                                            'May' => 'May',
                                            'June' => 'June',
                                            'July' => 'July',
                                            'August'   => 'August',
                                            'September'    => 'September',
                                            'October'  => 'October',
                                            'November' => 'November',
                                            'December' => 'December'
                                        ]
                                    )!!}
                                </select>
                                @include('elements.feedback',['field' => 'month'])
                            </div>
                        </div>
                        {{-- description --}}
                        <div class="form-group row {{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label for="description" class="col-sm-3 text-right control-label col-form-label">Description <sup class="text-danger font-bold">*</sup> :</label>
                            <div class="col-sm-9">
                                <input type="text" name="description" value="{{old('description','Salary')}}" class="form-control" id="description" placeholder="Salary"  autocomplete="off">
                                @include('elements.feedback',['field' => 'description'])
                            </div>
                        </div>
                        {{-- Resource --}}
                        <div class="form-group row {{ $errors->has('resource') ? ' has-danger' : '' }}">
                            <label for="resource" class="col-sm-3 text-right control-label col-form-label">Resource<sup class="text-danger font-bold">*</sup> :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="{{old('resource')}}" placeholder="eg. SD5700442" name="resource" id="resource">
                                @include('elements.feedback',['field' => 'resource'])
                            </div>
                        </div>

                        {{-- Project Name --}}
                        <div class="form-group row {{ $errors->has('project_name') ? ' has-danger' : '' }}">
                            <label for="project_name" class="col-sm-3 text-right control-label col-form-label">Product Name<sup class="text-danger font-bold">*</sup> :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="{{old('project_name')}}" placeholder="ABC Project" name="project_name" id="project_name">
                                @include('elements.feedback',['field' => 'project_name'])
                            </div>
                        </div>

                        {{-- input_days --}}
                        <div class="form-group row {{ $errors->has('input_days') ? ' has-danger' : '' }}">
                            <label for="input_days" class="col-md-6 text-right control-label col-form-label">Days<sup class="text-danger font-bold">*</sup> :</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control"  value="{{old('input_days')}}" placeholder="Working days" name="input_days" id="input_days">
                                @include('elements.feedback',['field' => 'input_days'])
                            </div>
                        </div>
                        {{-- Basic --}}
                        <div class="form-group row {{ $errors->has('basic') ? ' has-danger' : '' }}">
                            <label for="basic" class="col-md-6 text-right control-label col-form-label">Basic<sup class="text-danger font-bold">*</sup> :</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control"  value="{{old('basic')}}" placeholder="Basic" name="basic" id="basic">
                                @include('elements.feedback',['field' => 'basic'])
                            </div>
                        </div>
                        {{-- House Rent --}}
                        <div class="form-group row {{ $errors->has('house_rent') ? ' has-danger' : '' }}">
                            <label for="house_rent" class="col-md-6 text-right control-label col-form-label">House Rent : <i class="mdi mdi-plus-box-outline"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control"  value="{{old('house_rent')}}" placeholder="0.00" name="house_rent" id="house_rent">
                                @include('elements.feedback',['field' => 'house_rent'])
                            </div>
                        </div>
                        {{-- Medical --}}
                        <div class="form-group row {{ $errors->has('medical') ? ' has-danger' : '' }}">
                            <label for="medical" class="col-md-6 text-right control-label col-form-label">Medical : <i class="mdi mdi-plus-box-outline"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" onkeypress="addition('medical')" value="{{old('medical')}}" placeholder="0.00" name="medical" id="medical">
                                @include('elements.feedback',['field' => 'medical'])
                            </div>
                        </div>
                        {{-- conveyance --}}
                        <div class="form-group row {{ $errors->has('conveyance') ? ' has-danger' : '' }}">
                            <label for="conveyance" class="col-md-6 text-right control-label col-form-label">Conveyance : <i class="mdi mdi-plus-box-outline"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control"  value="{{old('conveyance')}}" placeholder="0.00" name="conveyance" id="conveyance">
                                @include('elements.feedback',['field' => 'conveyance'])
                            </div>
                        </div>

                        {{-- earnleave --}}
                        <div class="form-group row {{ $errors->has('earnleave') ? ' has-danger' : '' }}">
                            <label for="earnleave" class="col-md-6 text-right control-label col-form-label">Earnleave : <i class="mdi mdi-plus-box-outline"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control"  value="{{old('earnleave')}}" placeholder="0.00" name="earnleave" id="earnleave">
                                @include('elements.feedback',['field' => 'earnleave'])
                            </div>
                        </div>

                        {{-- Bonus --}}
                        <div class="form-group row {{ $errors->has('bonus') ? ' has-danger' : '' }}">
                            <label for="bonus" class="col-md-6 text-right control-label col-form-label">Bonus : <i class="mdi mdi-plus-box-outline"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control"  value="{{old('bonus')}}" placeholder="0.00" name="bonus" id="bonus">
                                @include('elements.feedback',['field' => 'bonus'])
                            </div>
                        </div>

                        {{-- Overtime --}}
                        <div class="form-group row {{ $errors->has('overtime') ? ' has-danger' : '' }}">
                            <label for="overtime" class="col-md-6 text-right control-label col-form-label">Overtime : <i class="mdi mdi-plus-box-outline"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control"  value="{{old('overtime')}}" placeholder="0.00" name="overtime" id="overtime">
                                @include('elements.feedback',['field' => 'overtime'])
                            </div>
                        </div>
                        {{-- Auctual_gross --}}
                        <div class="form-group row {{ $errors->has('auctual_gross') ? ' has-danger' : '' }}">
                            <label for="auctual_gross" class="col-md-6 text-right control-label col-form-label">Auctual Gross<sup class="text-danger font-bold">*</sup> : <i class="mdi mdi-equal"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control special-font" readonly value="{{old('auctual_gross')}}" placeholder="0.00" name="auctual_gross" id="auctual_gross">
                                @include('elements.feedback',['field' => 'auctual_gross'])
                            </div>
                        </div>

                        {{-- Arrear_adjusment/Refund security money --}}
                        <div class="form-group row {{ $errors->has('arrear_adjustment') ? ' has-danger' : '' }}">
                            <label for="arrear_adjustment" class="col-md-6 text-right control-label col-form-label">Arrear Adjustment :  <i class="mdi mdi-plus-box-outline"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control"  value="{{old('arrear_adjustment')}}" placeholder="0.00" name="arrear_adjustment" id="arrear_adjustment">
                                @include('elements.feedback',['field' => 'arrear_adjustment'])
                            </div>
                        </div>

                        {{-- gross_salary --}}
                        <div class="form-group row {{ $errors->has('gross_salary') ? ' has-danger' : '' }}">
                            <label for="gross_salary" class="col-md-6 text-right control-label col-form-label">Gross Salary <sup class="text-danger font-bold">*</sup> : <i class="mdi mdi-equal"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control special-font" readonly  value="{{old('gross_salary')}}" placeholder="0.00" name="gross_salary" id="gross_salary">
                                @include('elements.feedback',['field' => 'gross_salary'])
                            </div>
                        </div>

                        {{-- pf --}}
                        <div class="form-group row {{ $errors->has('pf') ? ' has-danger' : '' }}">
                            <label for="pf" class="col-md-6 text-right control-label col-form-label">PF : <i class="mdi mdi-plus-box-outline"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control"  value="{{old('pf')}}" placeholder="0.00" name="pf" id="pf">
                                @include('elements.feedback',['field' => 'pf'])
                            </div>
                        </div>

                        {{-- others --}}
                        <div class="form-group row {{ $errors->has('others') ? ' has-danger' : '' }}">
                            <label for="others" class="col-md-6 text-right control-label col-form-label">Others : <i class="mdi mdi-plus-box-outline"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control"  value="{{old('others')}}" placeholder="0.00" name="others" id="others">
                                @include('elements.feedback',['field' => 'others'])
                            </div>
                        </div>

                        {{-- total_payable --}}
                        <div class="form-group row {{ $errors->has('total_payable') ? ' has-danger' : '' }}">
                            <label for="total_payable" class="col-md-6 text-right control-label col-form-label">Total Payable<sup class="text-danger font-bold">*</sup> : <i class="mdi mdi-equal"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control special-font" readonly  value="{{old('total_payable')}}" placeholder="0.00" name="total_payable" id="total_payable">
                                @include('elements.feedback',['field' => 'total_payable'])
                            </div>
                        </div>
                        
                        {{-- Addition End & Deduction --}}
                        
                        
                        {{-- deduction_fp_self --}}
                        <div class="form-group row {{ $errors->has('deduction_fp_self') ? ' has-danger' : '' }}">
                            <label for="deduction_fp_self" class="col-md-6 text-right control-label col-form-label">Deduction Fp Self : <i class="mdi mdi-minus-box-outline"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" value="{{old('deduction_fp_self')}}" placeholder="0.00" name="deduction_fp_self" id="deduction_fp_self">
                                @include('elements.feedback',['field' => 'deduction_fp_self'])
                            </div>
                        </div>

                        {{-- deduction_fp_company --}}
                        <div class="form-group row {{ $errors->has('deduction_fp_company') ? ' has-danger' : '' }}">
                            <label for="deduction_fp_company" class="col-md-6 text-right control-label col-form-label">Deduction Fp Company : <i class="mdi mdi-minus-box-outline"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" value="{{old('deduction_fp_company')}}" placeholder="0.00" name="deduction_fp_company" id="deduction_fp_company">
                                @include('elements.feedback',['field' => 'deduction_fp_company'])
                            </div>
                        </div>

                        {{-- deduction_tax --}}
                        <div class="form-group row {{ $errors->has('deduction_tax') ? ' has-danger' : '' }}">
                            <label for="deduction_tax" class="col-md-6 text-right control-label col-form-label">Deduction Tax : <i class="mdi mdi-minus-box-outline"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" value="{{old('deduction_tax')}}" placeholder="0.00" name="deduction_tax" id="deduction_tax">
                                @include('elements.feedback',['field' => 'deduction_tax'])
                            </div>
                        </div>

                        {{-- advance --}}
                        <div class="form-group row {{ $errors->has('advance') ? ' has-danger' : '' }}">
                            <label for="advance" class="col-md-6 text-right control-label col-form-label">Donation Loan/Advance : <i class="mdi mdi-minus-box-outline"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" value="{{old('advance')}}" placeholder="0.00" name="advance" id="advance">
                                @include('elements.feedback',['field' => 'advance'])
                            </div>
                        </div>

                        {{-- net_payment --}}
                        <div class="form-group row {{ $errors->has('net_payment') ? ' has-danger' : '' }}">
                            <label for="net_payment" class="col-md-6 text-right control-label col-form-label">Net Payment <sup class="text-danger font-bold">*</sup> : <i class="mdi mdi-equal"> </i></label>
                            <div class="col-sm-6">
                                <input type="number" readonly required class="form-control special-font" value="{{old('net_payment')}}" placeholder="0.00" name="net_payment" id="net_payment">
                                @include('elements.feedback',['field' => 'net_payment'])
                            </div>
                        </div>

                        
                        <div class="form-group m-b-0 float-right"> 
                            <button type="submit" class="btn bg-theme text-white">Save</button>
                        </div>
                
                    </div>
                 </div> 
            </div> 
            <div class="col-md-5 float-right">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">New Payroll</h4>
                        <form class="form-material m-t-40 form" action="{{ route('payroll.store') }}" method="post">
                            @csrf
                            <div class="form-group row {{ $errors->has('timezone') ? ' has-danger' : '' }}">
                                <label for="timezone" class="col-sm-3 text-right control-label col-form-label">Name <sup class="text-danger font-bold">*</sup> :</label>
                                <div class="col-sm-9">
                                    <input type="text" name="timezone" value="{{old('timezone')}}" class="form-control" id="timezone" placeholder="Time zone name" required autocomplete="off">
                                    @include('elements.feedback',['field' => 'timezone'])
                                </div>
                            </div>   
                            <div class="form-group row {{ $errors->has('gmt') ? ' has-danger' : '' }}">
                                <label for="gmt" class="col-sm-3 text-right control-label col-form-label">GMT <sup class="text-danger font-bold">*</sup> :</label>
                                <div class="col-sm-9">
                                    <input type="text" name="gmt" value="{{old('gmt')}}" class="form-control" id="gmt" placeholder="e.g +6.00"  autocomplete="off">
                                    @include('elements.feedback',['field' => 'gmt'])
                                </div>
                            </div>   
                            <div class="form-group m-b-0 float-right"> 
                                <button type="submit" class="btn bg-theme text-white">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>    
    </div>
</div>
@include('elements.dataTableOne')
@endsection

@push('js')
    <script>
        $('#house_rent').on('keyup change',function(){
            $(this).val();
        });

        function getValue(v,input){
            var s = 0;
            if(v == input){
                return parseFloat($(this).val())||0;
            }else{
                return parseFloat($('#'+input).val())||0;
            }
            return s;
        }
        // function addition(forPress){
        //     $(this).val();
        //     // var sum = parseFloat($(this).val())||0;
        //     // sum += getValue(forPress,'house_rent');
        //     // sum += getValue(forPress,'medical');
        //     console.log(forPress);
        // }
        // function deduction(){}
        // function calculate(){

        // }
    </script>
@endpush
