@extends('layouts.admin')

@section('styles')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css">
@stop

@section('content')
	<h1>Create Photo</h1>
	{!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'files'=>true, 'class'=>'dropzone']) !!}
		
	{!! Form::close() !!}

	@include('includes.form_error')

@stop

@section('footer')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js"></script>
@stop