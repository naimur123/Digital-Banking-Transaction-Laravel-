<!DOCTYPE html>
<html>
<head>
	<title>User list page</title>
</head>
<body>

	<h3>All User</h3>
	<a href="<?php echo e(route('home.home')); ?>">Back</a> |
	<a href="/app/logout">logout</a>

	<br>
	<br>

	<table border="1">
		<tr>
			<td>ID</td>
			<td>NAME</td>
			<td>USERNAME</td>
			<td>CGPA</td>
			<td>Type</td>
			<td>Action</td>
		</tr>

		<?php for($i=0; $i < count($users); $i++): ?>
		<tr>
			<td><?php echo e($users[$i]['id']); ?></td>
			<td><?php echo e($users[$i]['username']); ?></td>
			<td><?php echo e($users[$i]['password']); ?></td>
			<td><?php echo e($users[$i]['name']); ?></td>
			<td><?php echo e($users[$i]['type']); ?></td>
			<td>
				<a href="<?php echo e(route('home.edit', $users[$i]['id'])); ?>">Edit</a> |
				<a href="/app/delete/<?php echo e($users[$i]['id']); ?>">Delete</a> 
			</td>
		</tr>
		<?php endfor; ?>
	</table>

</body>
</html><?php /**PATH H:\ATP-3\Final\try\resources\views/home/userlist.blade.php ENDPATH**/ ?>