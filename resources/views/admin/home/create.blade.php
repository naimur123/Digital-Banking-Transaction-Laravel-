@extends('layout/navbar')
@section('createadmin')
<body>
	<div class="container">
	<a href="{{route('admin.home.home')}}">Home</a>
	<div class="form-group">
	<form method="post" enctype="multipart/form-data">

	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<fieldset>
	<legend>Create Admin</legend>
			
	<div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr" name="name">
	</div>
	  <div class="form-group">
		<label for="usrnm">User Name:</label>
		<input type="text" class="form-control" id="usrnm" name="username" required>
	  </div>
	  <div class="form-group">
		<label for="email">Email:</label>
		<input type="email" class="form-control" id="email" name="email">
	  </div>
	  <div class="form-group">
		<label for="cntno">Contact Number:</label>
		<input type="text" class="form-control" id="cntno" name="contactno" placeholder="+88 01123456789"
		pattern="[+88]{3} [0-9]{11}">
	  </div>
	  <div class="form-group">
		<label for="nid">NID:</label>
		<input type="text" class="form-control" id="nid" name="nid" placeholder="123-45-678"
		pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
	  </div>
	  <div class="form-group">
		<label>Gender:</label>
		<input type="radio" id="defaultRadio" name="gender" value="Male">
		<label for="defaultRadio">Male</label>
		<input type="radio" id="defaultRadio1" name="gender" value="Female">
		<label for="defaultRadio1">Female</label>
	  </div>
	  <div class="form-group">
		<label for="adrs">Address:</label>
		<input type="text" class="form-control" id="adrs" name="address">
	  </div>
	  <div class="form-group">
		<label for="tp">User Type:</label>
		<input type="text" class="form-control" id="tp" name="type" required>
	  </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password" required>
	</div>
	
	<button type="submit" class="btn btn-primary">Submit</button><br>
			
			</fieldset>
		</form>
	<a href="{{route('admin.home.home')}}">Back</a><br>

		@foreach($errors->all() as $err)
			{{$err}} <br>
		@endforeach
</body>
@endsection
