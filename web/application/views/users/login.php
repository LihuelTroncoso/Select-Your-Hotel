<?php echo validation_errors(); ?>
<?php echo form_open('users/login'); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
	   	<h1 class="text-center"><?= $title ?></h1>	
	   	<div class="form-group">
	   		<!--  <label>Username</label> -->
	   		 <input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
	   	</div>
	   	<div class="form-group">
	   		 <!-- <label>Password</label> -->
	   		 <input type="password" class="form-control" name="password" placeholder="Enter Password" required autofocus>
	   	</div>
		<div class="d-flex justify-content-center">
	   		<button type="submit" class="btn btn-primary btn-block">Login</button>
		</div>
	</div>
<?php echo form_close() ?>
<div class="col-md-4 col-md-offset-4">
		<div class="text-center mt-2">or</div>
		<div class="d-flex justify-content-center">
			<button class="btn btn-primary btn-block"><a class="link-light" href=<?php echo site_url('/users/register')?>>Register</a></button>
		</div>
	</div>
</div>
<div class="row">
	
</div>