
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar Akun</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>backadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>backadmin/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Akun Baru</h1>
                            </div>
                            <?php 
                              echo validation_errors('<div class="alert alert-warning alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>','</div>');

                              if($this->session->flashdata('pesan')){
                                echo '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i>Sukses!</h5>';
                                echo $this->session->flashdata('pesan');
                                echo '</div>';
                                }

                            echo form_open('pelanggan/register');?>                                
                                <div class="form-group">
                                        <input type="text" name="nama_pelanggan" value="<?= set_Value('nama_pelanggan')?>" class="form-control form-control-user" 
                                            placeholder="Nama Anda">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email"  value="<?= set_Value('email')?>" class="form-control form-control-user" 
                                        placeholder="Email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                         placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="ulangi_password" class="form-control form-control-user"
                                          placeholder="Ulangi Password">
                                    </div>
                                </div>
                                <button type="submit" href="login.html" class="login-nih btn btn-info btn-user btn-block">
                                    Register Account
</button>
                                <a href="<?=base_url() ?>" class="login-nih btn btn-success btn-user btn-block">
                                    Lihat Website
                                </a>
                                <hr>
                                
                           <?php form_close()?>
                           
                            <div class="text-center">
                                <a class="small" href="<?=base_url('pelanggan/login') ?>">Sudah Punya Akun?</a>
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


    <script>
$(function () {
    $("#example1").DataTable({
      "responsive": true, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  window.setTimeout(function(){$(".alert").fadeTo(500,0).slideUp(500,function(){
    $(this).remove()
  });
  },3000)
</script>
</body>

</html>