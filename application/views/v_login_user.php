
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
  <link rel="icon" type="image/x-icon" href="<?=base_url('assets/icon/BK2.ico')?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Artomoro | <?=$title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>backadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>backadmin/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

    <div class="mt-10 container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

           <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                   
                                <?php
                                    echo validation_errors('<div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>','</div>');

                                    if($this->session->flashdata('error')){
                                    echo '<div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                    echo $this->session->flashdata('error');
                                    echo '</div>';
                                    }
                                    if($this->session->flashdata('pesan')){
                                    echo '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  ';
                                    echo $this->session->flashdata('pesan');
                                    echo '</div>';
                                    }
                                    echo form_open('auth/login_admin')
                                    ?>
                                        
                                        <div class="form-group">
                                           
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                           
                                       
                                        <button type="submit" class="login-nih btn btn-info btn-user btn-block">Login </button>
                                       

                                    <?php echo form_close()?>
                                   
                                    <hr>
                                    
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>backadmin/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>backadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url()?>backadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>backadmin/js/sb-admin-2.min.js"></script>

</body>

</html>