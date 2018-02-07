<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
	<h1>Tasks</h1>
	<ul>
		@foreach ($tasks as $task)
			<li>{{ $task->body }}</li>
		@endforeach
	</ul>
</body>
</html>