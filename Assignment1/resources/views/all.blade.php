

<!DOCTYPE html>
<html>
<head>
	<title>Laravel Exercise</title>
</head>
<body>
	@if (session('status'))
    <div>
          {{ session('status') }} 
    </div>
	@endif
	<table border="1">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
			<th>Delete</th>
		</tr>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td><a href="/user/{{ $user->id }}"> Detail </a></td>
				<td><a href="/deleteuser/{{ $user->id }}">Delete</a></td>
			</tr>
		@endforeach
			<form method="GET" action="/form" >
			<button type="Submit">Add Profile</button>
		</form>
		
	</table>

</body>
</html>