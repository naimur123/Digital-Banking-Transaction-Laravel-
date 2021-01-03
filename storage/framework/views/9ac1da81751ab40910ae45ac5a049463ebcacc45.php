<?php $__env->startSection('navbar'); ?>
<a href="/app/create">Create New Employee</a> |
<a href="/app/userlist">View User List</a> |
<a href="/app/users">Search User</a> |
<a href="/app/salarylist">Salarylist</a> |
<a href="/app/logout">logout</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\ATP-3\Final\try\resources\views/layout/navbar.blade.php ENDPATH**/ ?>