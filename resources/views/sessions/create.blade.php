@extends('layouts.master')

@section('content')
<div class="col-md-8 blog-main">
	<h3 class="pb-3 mb-4 font-italic border-bottom">
		Sign In
	</h3>

	@include('layouts.errors')

	<form method="post" action="/login">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="email">Email Address:</label>
			<input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-primary">
		</div>
	</form>	
</div>

@stop