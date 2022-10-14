<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Admin</h3>

                <div class="card-tools">
                  <button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Add</button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                    echo $this->session->flashdata('pesan');
                    echo '</h5></div>';
                }
                ?>
                <table class="table table-bordered" id="example1">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Bank</th>
                            <th>No Rekening</th>
                            <th>Atas Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; 
                        foreach ($rekening as $key => $value){ ?>

                      
                        <tr>
                            <td class="text-center"><?= $no++;?></td>
                            <td class="text-center"><?= $value->nama_bank?></td>
                            <td class="text-center"> <?= $value->no_rek?></td>
                            <td class="text-center"><?= $value->atas_nama?></td>
                          
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?=
                                $value->id_rekening?>"><i class="fas fa-user-edit"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?=
                                $value->id_rekening?>"><i class="fas fa-trash"></i></button>


                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="modal fade" id="add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
           
                <?php
                echo form_open('rekening/add');
                ?>

                 <div class="form-group">
                    <label>Nama Bank</label>
                    <input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" required>
                  </div>

                  <div class="form-group">
                    <label>No Rekening</label>
                    <input type="text" name="no_rek" class="form-control" placeholder="Nomor Rekening" required>
                  </div>

                  <div class="form-group">
                    <label>Atas Nama</label>
                    <input type="text" name="atas_nama" class="form-control" placeholder="Atas Nama" required>
                  </div>

                  
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
              <?php
                echo form_close();
                ?>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
   <!-- edit -->
   <?php foreach ($rekening as $key => $value){ ?>
      <div class="modal fade" id="edit<?=$value->id_rekening?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
           
                <?php
                echo form_open('rekening/edit/'.$value->id_rekening);
                ?>

                 <div class="form-group">
                    <label>Nama Bank</label>
                    <input type="text" name="nama_bank" value="<?=$value->nama_bank?>" class="form-control" placeholder="Nama Bank" required>
                  </div>

                  <div class="form-group">
                    <label>No Rekening</label>
                    <input type="text" name="no_rek" value="<?=$value->no_rek?>" class="form-control" placeholder="Nomor Rekening" required>
                  </div>

                  <div class="form-group">
                    <label>Atas Nama</label>
                    <input type="text" name="atas_nama" value="<?=$value->atas_nama?>" class="form-control" placeholder="Atas Nama" required>
                  </div>

                 

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
              <?php
                echo form_close();
                ?>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <?php } ?>


       <?php foreach ($rekening as $key => $value){ ?>
      <div class="modal fade" id="delete<?=$value->id_rekening?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">No Rekening : <?= $value->no_rek?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
           
                
            <h5>Apakah Anda Yakin Untuk Menghapus Rekening ini?</h5>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?=base_url('rekening/delete/'.$value->id_rekening)?>" class="btn btn-primary">Delete</a>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <?php } ?>