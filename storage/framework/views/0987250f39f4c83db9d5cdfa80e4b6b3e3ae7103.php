


<?php $__env->startSection('content'); ?>
<div class="card" style="width: 18rem;" padding-left="20%">
  <div class="card-body">
    <h5 class="card-title">Profile</h5>
    <?php for($i=0; $i < count($user); $i++): ?>
  
  <img src="<?php echo e(asset('upload/'.$user[$i]['profile_img'])); ?>"  width="100px" height="100px">
  <p><span class="font-weight-bold">Name: <?php echo e($user[$i]['name']); ?></span></p>
  <p><span class="font-weight-bold">Email: <?php echo e($user[$i]['email']); ?></span></p>
   <?php endfor; ?>
     
    <a href="/app/adminedit" class="btn btn-primary">Edit Profile</a>
   
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Home Page
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\ATP-3\Final\project\resources\views/admin/home/home.blade.php ENDPATH**/ ?>