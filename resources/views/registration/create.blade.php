@extends('layouts.master')

@section('content')
<div class="col-md-8 blog-main">
	<h3 class="pb-3 mb-4 font-italic border-bottom">
		Register
	</h3>

	<form method="post" action="/register">
		{{ csrf_field() }}

		@include('layouts.errors')

		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
		</div>

		<div class="form-group">
			<label for="email">Email:</label>
			<input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" class="form-control" required>
		</div>

		<div class="form-group">
			<label for="password_confirmation">Password Confirmation:</label>
			<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-primary">
		</div>
	</form>
</div>

@stop