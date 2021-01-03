<?php $__env->startSection('navbar'); ?>
<li class="nav-item">
<a class="nav-link" href="/app/create">Add New Admin</a>
<li class="nav-item">
<a class="nav-link" href="/app/createmanager">Create New Manager</a>
<li class="nav-item">
<a class="nav-link" href="/app/createagent">Create Agent</a>
<li class="nav-item">
<a class="nav-link" href="/app/users">Search User</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('dropdown'); ?>
<a class="dropdown-item" href="/app/adminlist">Admin List</a>
<a class="dropdown-item" href="/app/managerlist">Manager List</a>
<a class="dropdown-item" href="/app/userlist">User List</a>
<a class="dropdown-item" href="/app/salarylist">Salarylist</a>
<a class="dropdown-item" href="/app/transaction">Transactions</a>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('logout'); ?>
<li class="nav-item">
<a class="nav-link" href="/app/logout">Logout</a>
<li>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\ATP-3\Final\project\resources\views/layout/navbar.blade.php ENDPATH**/ ?>