
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
	<a class="navbar-brand" href="#">Top Navbar</a>
	
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">


  <li class="nav-item"> <?php echo anchor('pages/view/about','About',array('class'=>'nav-link'))?></li>
  <li class="nav-item"> <?php echo anchor('products/index/','Product',array('class'=>'nav-link'))?></li>
   <li class="nav-item"><?php echo anchor('pages/view/service','Service',array('class'=>'nav-link'))?></li>
   <li class="nav-item"><?php echo anchor('pages/view/contact','Contact',array('class'=>'nav-link'))?></li>
   <li class="nav-item"><?php echo anchor('crud/index','Crud',array('class'=>'nav-link'))?></li>
</ul>
    <ul class="navbar-nav right">
    	<?php if($this->session->userdata('authenticated')){?>
	<li class="nav-item"><?php echo anchor('dashboard/index/','Dashboard',array('class'=>'nav-link'))?></li>
	<li class="nav-item"><?php echo anchor('users/logout/','Logout',array('class'=>'nav-link'))?>
		<?php }else{?>
		<li class="nav-item"><?php echo anchor('users/signup/signup','Signup',array('class'=>'nav-link'))?></li>
	<li class="nav-item"><?php echo anchor('users/login/','Login',array('class'=>'nav-link'))?>
	    <?php }?>
	

</li>

	

</li>
</ul>
</div>

</nav>
</div>

	
	