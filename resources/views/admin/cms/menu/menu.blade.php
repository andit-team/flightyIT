@extends('admin.layout.app',['pageTitle' => __('CMS Menu')])
@section('content')

@include('elements.alert')
    <div class="row pt-4">
        <div class="col-lg-5 col-md-5">
            <div class="card">
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" id="menu_cr" action="{{route('menu.create')}}" class="form-material form">
                        <div class="row">
                            <div class="form-group col-md-5">
                                <select name="menu" id="" class="form-control">
                                    <option value="">Menu One</option>
                                    <option value="">Menu One</option>
                                    <option value="">Menu One</option>
                                    <option value="">Menu One</option>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" name="manu_name" required value="{{old('age')}}" class="form-control  form-control-line" id="age" placeholder="Type Manu Menu" autocomplete="off">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn bg-theme text-white">Create</button>
                            </div>
                        </div>            
                    </form> 
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')

@endpush

@push('js')
<script>
</script>
@endpush