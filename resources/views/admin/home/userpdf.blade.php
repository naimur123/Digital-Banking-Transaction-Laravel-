<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

       <table  class="table table-bordered yajra-datatable" border="1" color="#336600"> 
		<tr>
            <td color="Blue">ID</td>
			<td color="Blue">Name</td>
			<td color="Blue">User Name</td>
			<td color="Blue">Email</td>
			<td color="Blue">Contact Number</td>
			<td color="Blue">NID</td>
			<td color="Blue">Gender</td>
			<td color="Blue">Type</td>
			<td color="Blue">Address</td>
			
			
		</tr>

		@for($i=0; $i < count($users); $i++)
		<tr>
            <td>{{$users[$i]['id']}}</td>
			<td>{{$users[$i]['name']}}</td>
			<td>{{$users[$i]['username']}}</td>
			<td>{{$users[$i]['email']}}</td>
			<td>{{$users[$i]['contactno']}}</td>
			<td>{{$users[$i]['nid']}}</td>
			<td>{{$users[$i]['gender']}}</td>
			<td>{{$users[$i]['usertype']}}</td>
			<td>{{$users[$i]['address']}}</td>
			
		</tr>
		@endfor
	</table>

</body>
</html>