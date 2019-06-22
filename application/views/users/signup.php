


<div class="container">
	<h1><?php echo $title ?></h1>
<?php echo form_open('users/signup', array('id'=>'signupForm', 'class'=> 'sign-form'))?>
<div class="form-group">
	<input type="text" name="first_name" id="first_name" style="width:500px" placeholder="First Name" value="<?php echo set_value('first_name')?>">
	<?php echo form_error('first_name','<div class="error">','</div')?>


	</div>

	<br>

	<div class="form-group">
	<input type="text" name="last_name" id="last_name" style="width:500px" placeholder="Last Name">
     <?php echo form_error('last_name','<div class="error">','</div')?>

	</div>

	<br>
	<div class="form-group">
	<input type="text" name="email" id="email" style="width:500px" placeholder="Email">
     <?php echo form_error('email','<div class="error">','</div')?>

	</div>

	<br>
	<div class="form-group">
	<input type="password" name="password" id="password" style="width:500px" placeholder="Password">
    <?php echo form_error('password','<div class="error">','</div')?>
	</div>

	<br>
	<div class="form-group">
	<input type="password" name="passconf" id="passconf" style="width:500px" placeholder=" Confirm Password">
	<?php echo form_error('passconf','<div class="error">','</div')?>
	
	</div>

	<br>

	<div class="form-group">
	<input type="submit" class="btn btn-success" name="submit" value="sign up"/>
	
	</div>

	<br>
<?php echo form_close()?>



</div>