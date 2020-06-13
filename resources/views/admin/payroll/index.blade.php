@extends('admin.layout.app',['pageTitle' => 'Timezone'])
@section('content')

@component('admin.layout.inc.breadcrumb')
@slot('title')
Timezone
@endslot
@endcomponent
@include('elements.alert')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="col-md-7 d-inline-block">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title d-inline">Timezone</h4><br>

                <div class="col-lg-12">
                    <div class="Content">
                        <table class="table table-bordered table-hover Content" id="dataTableNoPagingDesc">
                            <thead>
                                <tr class="themead">
                                    <th width="50">Sl</th>
                                    <th>Timezone</th>   
                                    <th>GMT</th>  
                                    <th width="100">{{__('messages.action')}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 0;?>
                               @foreach($timezones as $timezone)
                                <tr>
                                    <td>{{sprintf('%02d',++$i)}}</td>
                                    <td>{{ $timezone->timezone }}</td> 
                                    <td>{{ $timezone->gmt }}</td> 
                                    
                                    <td style="display: flex; justify-content: space-evenly;">
                                        {{-- <a class="btn waves-effect waves-light btn-xs btn-info" href="{{ url('timezone/'.$timezone->id) }}"><i class="fa fa-eye"></i></a>
                                        <a class="btn waves-effect waves-light text-light btn-xs btn-warning" href="{{ url('timezone/'.$timezone->slug.'/edit') }}"><i class="fa fa-edit"></i></a> --}}
                                        <form action="{{ route('timezone.destroy',$timezone->id) }}" method="post" style="margin-top:-2px" id="deleteButton{{$timezone->id}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn waves-effect waves-light btn-xs btn-danger" onclick="sweetalertDelete({{$timezone->id}})"><i class="fa fa-trash-o"></i></button>
                                        </form> 
                                    </td> 
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
    <div class="col-md-5 float-right">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">New Timezone</h4>
                    {{-- <h6 class="card-subtitle">Create a new timezone</h6> --}}
                    
                    <form class="form-material m-t-40 form" action="{{ route('timezone.store') }}" method="post">
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
</div>
</div>
@include('elements.dataTableOne')
@endsection
