@extends('admin.layout.app',['pageTitle' => __('User Management')])
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
                <h4 class="card-title text-white"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Add Agent</h4>
                <h6 class="card-subtitle">New Agent Registration Form</h6>
            </div>
            <div class="card-body">
                
                <form class="form-material m-t-40 form" action="{{url('system-admin/users/store')}}" method="post">
                    @csrf

                    <div class="form-group row {{ $errors->has('first_name') ? ' has-danger' : '' }}">
                        <label for="first_name" class="col-sm-2 text-right control-label col-form-label">{{ __('messages.first_name') }}<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-10">
                            <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control" id="first_name" placeholder="First Name" required autocomplete="off">
                            @include('elements.feedback',['field' => 'first_name'])
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('last_name') ? ' has-danger' : '' }}">
                        <label for="last_name" class="col-sm-2 text-right control-label col-form-label">{{ __('messages.last_name') }}<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-10">
                            <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control" id="last_name" placeholder="Last Name" required autocomplete="off">
                            @include('elements.feedback',['field' => 'last_name'])
                        </div>
                    </div>
                    {{-- phone --}}
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 text-right control-label col-form-label">Phone:</label>
                        <div class="col-sm-10">
                            <input type="number" name="phone" value="{{old('phone')}}" class="form-control" id="phone" placeholder="Phone">
                            @include('elements.feedback',['field' => 'phone'])
                        </div>
                    </div>
                    {{-- agency --}}
                    <div class="form-group row">
                        <label for="agency" class="col-sm-2 text-right control-label col-form-label">Agency:</label>
                        <div class="col-sm-10">
                            <input type="text" name="agency" value="{{old('agency')}}" class="form-control" id="agency">
                            @include('elements.feedback',['field' => 'agency'])
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('role') ? ' has-danger' : '' }}">
                        <label for="role" class="col-sm-2 text-right control-label col-form-label">{{ __('messages.role') }}<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-10">
                            <select class="form-control col-12" id="role" name="role" required>
                                <?php echo Core::roleOptions($roles,'client')?>
                            </select>
                            @include('elements.feedback',['field' => 'role'])
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label for="email" class="col-sm-2 text-right control-label col-form-label">{{ __('messages.email') }}<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}" required autocomplete="off">
                            @include('elements.feedback',['field' => 'email'])
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label for="password" class="col-sm-2 text-right control-label col-form-label">{{ __('messages.password') }}<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required autocomplete="off">
                            {{-- <small class="form-text text-muted">Login detils will be send on user email.</small> --}}
                            @include('elements.feedback',['field' => 'password'])
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <button type="submit" class="btn btn-themecolor waves-effect float-right waves-light m-t-10">{{ __('messages.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
