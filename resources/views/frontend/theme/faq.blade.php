
@extends('frontend.layout.theme-master',['pageTitle' => __('Main Dashboard')])

@section('content')
	{!!$cms_page['content']!!}
@endsection