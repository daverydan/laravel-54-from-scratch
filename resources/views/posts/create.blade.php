@extends('layouts.master')

@section('content')
<div class="col-md-8 blog-main">
	<h3 class="pb-3 mb-4 font-italic border-bottom">
		Create a post
	</h3>

	@include('layouts.errors')
	
	<form method="post" action="/posts">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="title">Title:</label>
			<input type="text" class="form-control" name="title">
		</div>

		<div class="form-group">
			<label for="body">Body</label>
			<textarea id="body" name="body" class="form-control"></textarea>
		</div>

		<div class="form-group float-left">
			<a href="/" class="btn btn-danger">Cancel</a>
		</div>

		<div class="form-group float-right">
			<button type="submit" class="btn btn-primary">Publish</button>
		</div>
		
	</form>
</div>
@stop
