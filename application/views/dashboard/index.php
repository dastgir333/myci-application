

<div class="container">
	<h1> <?php echo $title ?></h1>
<h3>Welcome to dashboard</h3>
<div class="row">
<div class="col-md-9">
<div class="user_profile">
	<table class="table table-bordered">
		<tr>
			<td><strong>First Name</strong></td>


			<td><?php echo $user->first_name ?></td>

		</tr>
		<tr>
			<td><strong>Last Name</strong></td>
			<td><?php echo $user->last_name ?></td>
             </tr>
             <tr>
			<td><strong>Email Address</strong></td>
			<td><?php echo $user->email ?></td>

		</tr>
		    <tr>
			<td><strong>Created At</strong></td>
			<td><?php echo $user->created_at ?></td>
             </tr>

             
             <tr>
			<td><strong>Active</strong></td>
			<td><?php echo $user->active ?></td>
             </tr>


	</table>

</div>
<div class="userlinks">
	
	<br>
	<?php echo anchor('users/changePassword', 'Change Password')?>
	<br>
	<?php echo anchor('users/logout', 'Logout')?>

</div>
</div>
<div class="col-md-3">
	<div class="user_pic">
		
		<img src="<?php echo base_url('uploads/'.$user->profile_photo)?>" class="img-thumbnail" alt="user_imgage"/>
		
</div>
<br>
	<a href="<?php echo site_url('users/upload')?>" class="btn btn-success btn-block">Upload Image</a>
	


</div>
</div>