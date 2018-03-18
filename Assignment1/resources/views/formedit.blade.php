<!DOCTYPE html>
<html>
<head>
	<title>Laravel</title>
</head>
<body>
	<form method="POST" action="/update" >
		{{ csrf_field() }}
		@foreach($user as $user)
		<input type="hidden" name="id" value="{{ $user->id }}"> <br/>
		<input type="text" name="name" placeholder= "name" value="{{ $user->name }}" required> <br/>
		<input type="text" name="email" placeholder="email" value="{{ $user->email }}" required> <br/>
		<input type="password" name="password" placeholder="password" value="{{ $user->password }}" required> <br/>
		<button type="Submit" >Submit</button>
		@endforeach
	</form>

</body>
</html>