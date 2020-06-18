@extends('admin.layout.app',['pageTitle' => 'New Agency','noFooter' => 'true',])
@section('content')

@include('elements.alert')
<div class="row">
    <div class="col-lg-10 col-md-10 m-t-30 mx-auto">
        <form class="form-material m-t-40 form" action="{{ route('agency.store') }}" method="post" autocomplete="off">
            @csrf
            {{-- New Card --}}
            <div class="card">
                <div class="card-header bg-dark">
                    <h4 class="mb-0 text-white"><i class="fa fa-pencil"></i>&nbsp;&nbsp;New Agency</h4></div>
                <div class="card-body">
                    <h3 class="card-title">Special title treatment</h3>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <hr>
                    {{-- company, alias --}}
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 text-right control-label col-form-label">Company<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Enter name here">
                            @include('elements.feedback',['field' => 'name'])
                        </div>
                        
                        <label for="alias" class="col-sm-2 text-right control-label col-form-label">Alias <sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="text" name="alias" value="{{old('alias')}}" class="form-control" id="alias" placeholder="Alias name"  autocomplete="off">
                            @include('elements.feedback',['field' => 'alias'])
                        </div>
                    </div>

                    {{-- code, vat --}}
                    <div class="form-group row">
                        <label for="code" class="col-sm-2 text-right control-label col-form-label">Company Code<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="text" name="code" value="{{old('code')}}" class="form-control" id="code" placeholder="Enter Company Code">
                            @include('elements.feedback',['field' => 'code'])
                        </div>
                        
                        <label for="vat" class="col-sm-2 text-right control-label col-form-label">Vat <sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="text" name="vat" value="{{old('vat')}}" class="form-control" id="vat" placeholder="Vat number">
                            @include('elements.feedback',['field' => 'vat'])
                        </div>
                    </div>

                    {{-- address, phone --}}
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 text-right control-label col-form-label">Company address<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="text" name="address" value="{{old('address')}}" class="form-control" id="address" placeholder="Enter Company address">
                            @include('elements.feedback',['field' => 'address'])
                        </div>
                        
                        <label for="phone" class="col-sm-2 text-right control-label col-form-label">Phone <sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="number" name="phone" value="{{old('phone')}}" class="form-control" id="phone" placeholder="phone number">
                            @include('elements.feedback',['field' => 'phone'])
                        </div>
                    </div>

                    {{-- com_email, mobile --}}
                    <div class="form-group row">
                        <label for="com_email" class="col-sm-2 text-right control-label col-form-label">Company email<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="com_email" name="com_email" value="{{old('com_email')}}" class="form-control" id="com_email" placeholder="Enter Company email">
                            @include('elements.feedback',['field' => 'com_email'])
                        </div>
                        
                        <label for="mobile" class="col-sm-2 text-right control-label col-form-label">Mobile <sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="number" name="mobile" value="{{old('mobile')}}" class="form-control" id="mobile" placeholder="mobile number">
                            @include('elements.feedback',['field' => 'mobile'])
                        </div>
                    </div>
                    {{-- email, em_number --}}
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 text-right control-label col-form-label">Email<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Enter email">
                            @include('elements.feedback',['field' => 'email'])
                        </div>
                        
                        <label for="em_number" class="col-sm-2 text-right control-label col-form-label">Emergency Number <sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="number" name="em_number" value="{{old('em_number')}}" class="form-control" id="em_number" placeholder="Emergency number">
                            @include('elements.feedback',['field' => 'em_number'])
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {{-- validity, type --}}
                    <div class="form-group row">
                        <label for="validity" class="col-sm-2 text-right control-label col-form-label">Company Validity<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="text" name="validity" value="{{old('validity')}}" class="form-control" id="validity" placeholder="Enter validity here">
                            @include('elements.feedback',['field' => 'validity'])
                        </div>
                        
                        <label for="type" class="col-sm-2 text-right control-label col-form-label">Type <sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="text" name="type" value="{{old('type')}}" class="form-control" id="type">
                            @include('elements.feedback',['field' => 'type'])
                        </div>
                    </div>
                    {{-- credit, linit --}}
                    <div class="form-group row">
                        <label for="credit" class="col-sm-2 text-right control-label col-form-label">Credit<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="text" name="credit" value="{{old('credit')}}" class="form-control" id="credit" placeholder="Enter credit here">
                            @include('elements.feedback',['field' => 'credit'])
                        </div>
                        
                        <label for="credit_limit" class="col-sm-2 text-right control-label col-form-label">Credit Limit <sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="credit_limit" name="credit_limit" value="{{old('credit_limit')}}" class="form-control" id="credit_limit">
                            @include('elements.feedback',['field' => 'credit_limit'])
                        </div>
                    </div>
                    {{-- note --}}
                    <div class="form-group row">
                        <label for="note" class="col-sm-2 text-right control-label col-form-label">Note:</label>
                        <div class="col-sm-10">
                            <input type="text" name="note" value="{{old('note')}}" class="form-control" id="note">
                            @include('elements.feedback',['field' => 'note'])
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {{-- company, alias --}}
                    <div class="form-group row">
                        <label for="gds" class="col-sm-2 text-right control-label col-form-label">Gds id<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-10">
                            <input type="text" name="gds" value="{{old('gds')}}" class="form-control" id="gds" placeholder="Enter gds here">
                            @include('elements.feedback',['field' => 'gds'])
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <label for="alias" class="col-sm-2 text-right control-label col-form-label">Start Date <sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="text" name="alias" value="{{old('alias')}}" class="form-control" id="alias" placeholder="Alias name"  autocomplete="off">
                            @include('elements.feedback',['field' => 'alias'])
                        </div>
                        
                        <label for="alias" class="col-sm-2 text-right control-label col-form-label">End Date <sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="text" name="alias" value="{{old('alias')}}" class="form-control" id="alias" placeholder="Alias name"  autocomplete="off">
                            @include('elements.feedback',['field' => 'alias'])
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="card-body">
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <button type="button" class="btn btn-dark">Cancel</button>
                            </div>
                        </div>
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
