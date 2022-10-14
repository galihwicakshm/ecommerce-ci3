

<div class="container mt-5">
<div class="col-md-6">
<div class="card card-solid">
    <div class="card-body pb-0">
    <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                    echo $this->session->flashdata('pesan');
                    echo '</h5></div>';
                }
                if ($this->session->flashdata('pesan1')) {
                    echo '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>';
                    echo $this->session->flashdata('pesan1');
                    echo '</h5></div>';
                }
                ?>
    

                     <div class="col-sm-8">
                    <div class="form-group">
                 
                        <label>Email Anda</label><br>
                        <p><?=$this->session->userdata('email')?></p>
                     
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                      
                   
                        <label>Nama Anda</label><br>
                        <p><?=$this->session->userdata('nama_pelanggan')?></p>
                      
                        </div>
                        </div>

                        
                       
                    <div class="form-group ml-3">
                        <!-- <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?=$this->session->userdata('id_pelanggan')?>">Edit</button> -->
                        <!-- <a href="<?= base_url('akun/(:str)')?>" class="btn btn-primary btn-sm">Edit</a> -->

                        <a href="<?= base_url('akun/ubah/'.$this->session->userdata('id_pelanggan'))?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="<?= base_url('home')?>" class="btn btn-warning btn-sm">Kembali</a>
                         </div>
                    </div>     
                     
                </div>
        </div>

    
      <!-- <div class="modal fade" id="edit<?=$this->session->userdata('id_pelanggan')?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Pelanggan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
           
                <?php
                echo form_open('akun/edit');
                ?>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?=$this->session->userdata('email')?>" class="form-control" placeholder="Email" required>
                  </div>

                 <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" value="<?=$this->session->userdata('nama_pelanggan')?>" class="form-control" placeholder="Nama Pelanggan" required>
                  </div>

                  
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
             
            </div>
            <?php
                echo form_close();
                ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div> -->
    </div>


<script>
  window.setTimeout(function(){$(".alert").fadeTo(500,0).slideUp(500,function(){
    $(this).remove()
  });
  },3000)
</script>