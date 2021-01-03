
<?php $__env->startSection('userlist'); ?>
<body>
<div class="container">
        <div class="row">
        <div class="panel panel-default">
        <div class="panel-heading">
        <div>
        <a href="<?php echo e(route('admin.home.home')); ?>">Home</a>
        </div>
        <h3>User List</h3>
        </div>

	<br>
	<table class="table table-bordered yajra-datatable">
	<div>
		<a href="<?php echo e(route('admin.home.updf')); ?>" padding="right">Download List</a>
    </div>
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>User Name</td>
			<td>Email</td>
			<td>Contact Number</td>
			<td>NID</td>
			<td>Gender</td>
			<td>Type</td>
			<td>Address</td>
			<td>Action</td>

		</tr>
	</thead>

		<?php for($i=0; $i < count($users); $i++): ?>
		<tr>
			<td><?php echo e($users[$i]['id']); ?></td>
			<td><?php echo e($users[$i]['name']); ?></td>
			<td><?php echo e($users[$i]['username']); ?></td>
			<td><?php echo e($users[$i]['email']); ?></td>
			<td><?php echo e($users[$i]['contactno']); ?></td>
			<td><?php echo e($users[$i]['nid']); ?></td>
			<td><?php echo e($users[$i]['gender']); ?></td>
			<td><?php echo e($users[$i]['usertype']); ?></td>
			<td><?php echo e($users[$i]['address']); ?></td>
			<td>
				<a href="<?php echo e(route('admin.home.edit', $users[$i]['id'])); ?>">Edit</a> |
				<a href="<?php echo e(route('admin.home.delete', $users[$i]['id'])); ?>">Delete</a>
			</td>
		</tr>
		<?php endfor; ?>
	</table>



</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\ATP-3\Final\project\resources\views/admin/home/userlist.blade.php ENDPATH**/ ?>