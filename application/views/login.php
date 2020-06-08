<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BackEnd | BelajarAplikasi</title>
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body role="document">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-dewe navbar-fixed-top-up">
      <div class="container">      	
      </div>
    </nav>
			
    <div class="container">
		<div style="margin: auto;width: 250px;">			
			<?php 
				if (validation_errors() != ''){
					echo '<div class="alert alert-warning" role="alert" id="alert_warning"><strong>'.validation_errors().'</strong></div>'; 
				}
			?>
			
			<?php echo form_open('Verifylogin'); ?>
			<h2 class="form-signin-heading">Login Backend</h2>
      <h4 class="form-signin-heading">belajaraplikasi.com</h4>
			<label for="inputEmail" class="sr-only">Username</label>
			<input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" onkeydown="user(event);" autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" onkeydown="pass(event);" ><br>
			<input class="btn btn-lg btn-danger btn-block" type="submit" value="Login"/>
		</div>
    </div> <!-- /container -->
</body>
</html>
