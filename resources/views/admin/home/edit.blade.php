@extends('layout/navbar')



@section('edit')
<body>
<div class="container">

<div class="form-group">
<form method="post" enctype="multipart/form-data">

<input type="hidden" name="_token" value="{{csrf_token()}}">
<fieldset>
<legend>Edit</legend>
		
<div class="form-group">
  <label for="usr">Name:</label>
  <input type="text" class="form-control" id="usr" name="name" value="{{$name}}">
</div>
  <div class="form-group">
	<label for="email">Email:</label>
	<input type="email" class="form-control" id="email" name="email" value="{{$email}}">
  </div>
  <div class="form-group">
	<label for="cntno">Contact Number:</label>
	<input type="text" class="form-control" id="cntno" name="contactno" placeholder="+88 01123456789"
	pattern="[+88]{3} [0-9]{11}" value="{{$contactno}}" required>
  </div>
  <div class="form-group">
	<label for="adrs">Address:</label>
	<input type="text" class="form-control" id="adrs" name="address" value="{{$address}}">
  </div>
  <div class="form-group">
		<label for="tp">User Type:</label>
		<input type="text" class="form-control" id="tp" name="type" value="{{$usertype}}" readonly>
	  </div>
   <div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" id="pwd" name="password" value="{{$password}}" required >
</div>
<div class="form-group">
  <label for="cpwd">New Password:</label>
  <input type="password" class="form-control" id="pwd" name="cpassword"  required >
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