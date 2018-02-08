@extends('layouts.master')

@section('content')
<div class="col-md-8 blog-main">
	<h3 class="pb-3 mb-4 font-italic border-bottom">
		<span>{{ $post->title }}</span>
		<br>
		<span style="font-size: 14px; color: #aaa;">{{ $post->created_at->toFormattedDateString() }}</span>
	</h3>

	<p>{{ $post->body }}</p>
</div>
@stop