@extends('layouts.app')

@section('content')
<div class='banner'>
	<div class='container'>
	    <ol class="breadcrumb-nav">
	        <li class='breadcrumb-item'><a href="{{ url('/') }}">{{ __('home') }}</a></li>
	        <li class="breadcrumb-item active">{{ __('metiers') }}</li>
	    </ol>
	 
	</div>
</div>
<div class="container">	
	<div class="metiers-page">
	
	</div>
</div>
@endsection