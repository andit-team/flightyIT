@extends('admin.layout.app',['pageTitle' => 'Cms Pages'])
@section('content')

@component('admin.layout.inc.breadcrumb')
@slot('title')
{{ 'Cms Pages' }}
@endslot
@endcomponent
@include('elements.alert')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cms Pages</h4>
                <div class="col-lg-12">
                    <div class="Content">
                        <table class="table table-bordered table-hover Content" id="">
                            <thead>
                                <tr class="themeThead">
                                    <th width="50" class="text-center">{{__('SL')}}</th>
                                    <th>{{__('messages.name')}}</th>
                                    <th width="200">{{__('messages.date')}}</th>
                                    
                                    @if(Sentinel::hasAccess('update-cms-page') || Sentinel::hasAccess('delete-cms-page'))
                                        <th width="100">{{__('Action')}}</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 0;?>
                                @foreach($cms as $cm)
                                <tr>
                                    <td class="text-center">{{sprintf('%02d',++$i)}}</td>
                                    <td><a href="{{url($cm->post_url)}}" target="_blank">{{ $cm->post_title}}</a></td>
                                    <td>{{ Core::dateFormat($cm->created_at)}}</td>
                                    @if(Sentinel::hasAccess('update-cms-page') || Sentinel::hasAccess('delete-cms-page'))
                                    <td>
                                        @if(Sentinel::hasAccess('update-cms-page'))
                                            <a class="float-left mr-1 btn waves-effect waves-light text-light btn-xs btn-warning" href="{{url('system-admin/cms/'.$cm->post_url.'/edit')}}"><i class="fa fa-edit"></i></a>
                                        @endif
                                        @if(Sentinel::hasAccess('delete-cms-page'))
                                            <form action="{{url('system-admin/cms/'.$cm->id)}}" method="post" style="margin-top:-2px" id="deleteButton{{$cm->id}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn waves-effect waves-light btn-xs btn-danger" onclick="sweetalertDelete({{$cm->id}})"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        @endif 
                                    </td>
                                    @endif
                                </tr>
                                @if($cm->child)
                                @php $j=0 @endphp
                                    @foreach($cm->child as $child)
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>{{sprintf('%02d',++$j)}} &nbsp;&nbsp; |__<a href="{{url($child->post_url)}}" target="_blank">{{ $child->post_title}}</a></td>
                                            <td>{{ Core::dateFormat($child->created_at)}}</td>
                                            @if(Sentinel::hasAccess('update-cms-page') || Sentinel::hasAccess('delete-cms-page'))
                                            <td>
                                                @if(Sentinel::hasAccess('update-cms-page'))
                                                    <a class="float-left mr-1 btn waves-effect waves-light text-light btn-xs btn-warning" href="{{url('system-admin/cms/'.$child->post_url.'/edit')}}"><i class="fa fa-edit"></i></a>
                                                @endif
                                                @if(Sentinel::hasAccess('delete-cms-page'))
                                                    <form action="{{url('system-admin/cms/'.$child->id)}}" method="post" style="margin-top:-2px" id="deleteButton{{$child->id}}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn waves-effect waves-light btn-xs btn-danger" onclick="sweetalertDelete({{$child->id}})"><i class="fa fa-trash-o"></i></button>
                                                    </form>
                                                @endif 
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('elements.dataTableOne')
@endsection