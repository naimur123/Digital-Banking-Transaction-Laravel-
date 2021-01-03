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
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php echo e($err); ?> <br>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<form method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<div class="container rounded bg-white mt-5 mb-5">
     
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
              <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo e($name); ?>"></div>
                   
                </div>
                <div class="row mt-3">
                <div class="col-md-6"><label class="labels">Email ID</label><input type="email" class="form-control" name="email" placeholder="enter email id" value="<?php echo e($email); ?>"></div>
                    
                <div class="col-md-6"><label class="labels">PhoneNumber</label><input type="text" class="form-control" name="contactno" placeholder="enter phone number" value="<?php echo e($contactno); ?>"></div>
                   
                    
                <div class="col-md-6"><label class="labels">Address</label><input type="text" class="form-control" name="address" placeholder="enter address" value="<?php echo e($address); ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Type</label><input type="text" class="form-control" name="type" placeholder="country" value="<?php echo e($usertype); ?>" readonly></div>
                   
                </div>
                <div class="row mt-3">
                <div class="col-md-6"><label class="labels">Password</label><input type="password" class="form-control" name="password" value="<?php echo e($password); ?>"></div>
                <div class="col-md-6"><label class="labels">New Password</label><input type="password" class="form-control" name="cpassword" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Change Profile Picture</label><input type="file" class="form-control" name="myimg"></div>
                   
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </div>
        </div>
      

</div>
</div>
</form>
</body>
</html><?php /**PATH H:\ATP-3\Final\project\resources\views/admin/home/adminedit.blade.php ENDPATH**/ ?>