@extends('admin.layout.app',['pageTitle' => 'New Payroll','noFooter' => 'true',])
@section('content')

@include('elements.alert')
<div class="row">
    <div class="col-lg-8 col-md-8 m-t-30 mx-auto">
        <form class="form-material m-t-40 form" action="{{ route('agent.store') }}" method="post" autocomplete="off">
            @csrf
            {{-- New Card --}}
            <div class="card border-dark">
                <div class="card-header bg-dark">
                    <h4 class="mb-0 text-white"><i class="fa fa-pencil"></i>&nbsp;&nbsp;New Agent</h4></div>
                <div class="card-body">
                    <h3 class="card-title">Special title treatment</h3>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <hr>
                    {{-- name, surname --}}
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 text-right control-label col-form-label">Name <sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Name of agent">
                            @include('elements.feedback',['field' => 'name'])
                        </div>
                        
                        <label for="surname" class="col-sm-2 text-right control-label col-form-label">Surname:</label>
                        <div class="col-sm-4">
                            <input type="text" name="surname" value="{{old('surname')}}" class="form-control" id="surname" placeholder="Surname of agent"  autocomplete="off">
                            @include('elements.feedback',['field' => 'surname'])
                        </div>
                    </div>
                    {{-- email, mobile --}}
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 text-right control-label col-form-label">Email:</label>
                        <div class="col-sm-4">
                            <input type="text" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Email of agent">
                            @include('elements.feedback',['field' => 'email'])
                        </div>
                        
                        <label for="mobile" class="col-sm-2 text-right control-label col-form-label">Mobile:</label>
                        <div class="col-sm-4">
                            <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control" id="mobile" placeholder="Mobile of agent">
                            @include('elements.feedback',['field' => 'mobile'])
                        </div>
                    </div>
                    {{-- phone, agency --}}
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 text-right control-label col-form-label">Phone:</label>
                        <div class="col-sm-4">
                            <input type="number" name="phone" value="{{old('phone')}}" class="form-control" id="phone" placeholder="Phone">
                            @include('elements.feedback',['field' => 'phone'])
                        </div>
                        <label for="agency" class="col-sm-2 text-right control-label col-form-label">Agency:</label>
                        <div class="col-sm-4">
                            <input type="text" name="agency" value="{{old('agency')}}" class="form-control" id="agency">
                            @include('elements.feedback',['field' => 'agency'])
                        </div>
                    </div>
                    {{-- username, password --}}
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 text-right control-label col-form-label">Username <sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="text" name="username" value="{{old('username')}}" class="form-control" id="username" placeholder="Login Username" autocomplete="off">
                            <small id="user-check"></small>
                            @include('elements.feedback',['field' => 'username'])
                        </div>

                        <label for="password" class="col-sm-2 text-right control-label col-form-label">Password <sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-4">
                            <input type="password" name="password" class="form-control" id="password" autocomplete="off">
                            @include('elements.feedback',['field' => 'password'])
                        </div>
                    </div>
                    {{-- type --}}
                    <div class="form-group row">
                        <label for="type" class="col-sm-2 text-right control-label col-form-label">Type <sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-10">
                            <select name="type" class="form-control" id="type">
                                {!!Core::getOptionArray(['agent' => 'Agent','admin' => 'Admin'])!!}
                            </select>
                            @include('elements.feedback',['field' => 'type'])
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
        $('#username').on('keyup change',function(){
            // username input
            a = $(this).val()

            if(a === ''){
                $('#user-check').html('')
            }
            else if(a.length > 1 && a.split(' ').length === 1){
                $('#user-check').html('user ok')
                $('#user-check').css({'color': 'green'})
            }else{
                $('#user-check').html('Invalid username')
                $('#user-check').css({'color': 'red'})
            }
        });
    </script>
@endpush
