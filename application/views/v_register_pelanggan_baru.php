
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>loginv2/css/main.css">
     <script src="https://kit.fontawesome.com/9ddd1343c6.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

     <link rel="stylesheet" href="<?= base_url()?>template/dist/css/adminlte.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url()?>template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <script src="<?= base_url()?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- DataTables -->
    
    <!-- Theme style -->

    <!-- jQuery -->
  <script src="<?= base_url()?>template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url()?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->

  <!-- AdminLTE App -->
    <!-- Theme style -->
  <link
          href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
          rel="stylesheet">

      <!-- Icons -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

      <link href="<?=base_url()?>tmaster/assets/css/nucleo-icons.css" rel="stylesheet">
      <link href="<?=base_url()?>tmaster/assets/css/font-awesome.css" rel="stylesheet">

      <!-- Jquery UI -->
      <link type="text/css" href="<?=base_url()?>tmaster/assets/css/jquery-ui.css" rel="stylesheet">

      <!-- Argon CSS -->
      <!-- <link type="text/css" href="<?=base_url()?>tmaster/assets/css/argon-design-system.min.css" rel="stylesheet"> -->

      <!-- Main CSS-->
      <!-- <link type="text/css" href="<?=base_url()?>tmaster/assets/css/style.css" rel="stylesheet"> -->
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>v2/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>v2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>v2/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>v2/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>v2/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>v2/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>v2/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>v2/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>v2/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>v2/css/main.css">



</head>
<body>

<!-- scripts -->
<script src="<?=base_url()?>particle/particles.js"></script>
<script src="<?=base_url()?>particle/app.js"></script>
		
	

	<div id="particles-js"></div>
  	<div class="row">
  <div class="col-6">

  </div>

          
					
          <div class="box mt-5">
                            <h2>Daftar Akun</h2>
				
							<?php
               echo validation_errors('<div class="alert alert-warning alert-dismissible">
                                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    ','</div>');
       
                                     if($this->session->flashdata('pesan')){
                                       echo '<div class="alert alert-success alert-dismissible">
                                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                       ';
                                       echo $this->session->flashdata('pesan');
                                       echo '</div>';
                                       }
                                       if($this->session->flashdata('error')){
                                        echo '<div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        ';
                                        echo $this->session->flashdata('error');
                                        echo '</div>';
                                        }  
                                    echo form_open('pelanggan/register');
                                    ?> 
      <form>
                                
                           <div class="limiter">
				<form class="login100-form validate-form">
					
					

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="email" name="email"  value="<?= set_Value('email')?>">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

          <div class="wrap-input100 validate-input" data-validate = "">
						<input class="input100" name="nama_pelanggan" value="<?= set_Value('nama_pelanggan')?>" >
						<span class="focus-input100" data-placeholder="Nama"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="ulangi_password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center mt-2">
						<span class="txt1">
							Sudah punya akun?
						</span>

						<a class="txt2" href="<?=base_url("pelanggan/login")?>">
							Sign in
						</a>
					</div>
				</form>
			</div>
	

	<div id="dropDownSelect1"></div>

                            
							
                          
					
	<script src="<?=base_url()?>particle/particles.js"></script>
    <script src="<?=base_url()?>particle/app.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>v2/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>v2/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>v2/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url()?>v2/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>v2/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>v2/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=base_url()?>v2/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>v2/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>v2/js/main.js"></script>

<script>
  window.setTimeout(function(){$(".alert").fadeTo(500,0).slideUp(500,function(){
    $(this).remove()
  });
  },3000)
</script>
</body>


</html>

