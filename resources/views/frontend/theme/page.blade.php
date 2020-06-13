
@extends('frontend.layout.theme-master',['pageTitle' => __('Main Dashboard')])

@section('content')
	<section>
		<div class="container mainContent">
			{!!$cms_page['content']!!}
		</div>
	</section>


@endsection