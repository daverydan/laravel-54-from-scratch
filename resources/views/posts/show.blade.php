@extends('layouts.master')

@section('content')
<div class="col-md-8 blog-main">
	<h3 class="pb-3 mb-4 font-italic border-bottom">
		<span>{{ $post->title }}</span>
		<br>
		<span style="font-size: 14px; color: #aaa;">{{ $post->created_at->toFormattedDateString() }}</span>
	</h3>

	<p>{{ $post->body }}</p>

	<hr>
		
	<div class="card px-3 py-2">
		<div class="card-block">
			<p><strong>Comment on post:</strong></p>
			@include('layouts.errors')
			<form method="post" action="/posts/{{ $post->id }}/comments">
				{{ csrf_field() }}

				<div class="form-group">
					<textarea name="body" placeholder="Your comment here." class="form-control" required></textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Add Comment</button>
				</div>
			</form>
		</div>
	</div>

	<hr>

	<div class="comments">
		<ul class="list-group">
			@foreach ($post->comments as $comment)
				<li class="list-group-item">
					<strong>{{ $comment->created_at->diffForHumans() }}: </strong>
					{{ $comment->body }}
				</li>
			@endforeach
		</ul>
	</div>
</div>
@stop