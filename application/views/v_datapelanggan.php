<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Pelanggan</h3>

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
                    echo ' <div class="alert alert-success alert-dismissible" role="alert">
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   ';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                }
                ?>
                <table class="table table-bordered" id="example1">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; 
                        foreach ($pelanggan as $key => $value){ ?>

                      
                        <tr>
                            <td class="text-center"><?= $no++;?></td>
                            <td class="text-center"><?= $value->nama_pelanggan?></td>
                            <td class="text-center"> <?= $value->email?></td>
                            <td class="text-center"><?= $value->password?></td>
                          
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?=
                                $value->id_pelanggan?>"><i class="fas fa-user-edit"></i> Edit</button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?=
                                $value->id_pelanggan?>"><i class="fas fa-trash"></i> Delete</button>


                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
              </div>
            </div>
         
          </div>

         <div class="modal fade" id="add" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Tambahkan User</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
           
                <?php
                echo form_open('datapelanggan/add');
                ?>

                 <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Email</label>
                    <input type="email" name="email"  class="form-control" placeholder="Email" required>
                                  </div>     
             
                 <div class="col mb-3">
                                   <label>Nama User</label>
                    <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" required> </div>     
             
                                   <div class="col mb-3">
                                    <label>Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Password" required> </div>     
             
                  
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
   <?php foreach ($pelanggan as $key => $value){ ?>
      <div class="modal fade" id="edit<?=$value->id_pelanggan?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1"><?=$value->nama_pelanggan?></h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
           
           
                <?php
                echo form_open('datapelanggan/edit/'.$value->id_pelanggan);
                ?>
              <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Email</label>
                    <input type="email" name="email" value="<?=$value->email?>" class="form-control" placeholder="Email" required>
                                  </div>     
             
                 <div class="col mb-3">
                                   <label>Nama User</label>
                    <input type="text" name="nama_pelanggan" value="<?=$value->nama_pelanggan?>" class="form-control" placeholder="Nama Pelanggan" required> </div>     
             
                                   <div class="col mb-3">
                                    <label>Password</label>
                    <input type="text" name="password" value="<?=$value->password?>" class="form-control" placeholder="Password" required> </div>     
             


              

                 

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


       <?php foreach ($pelanggan as $key => $value){ ?>
        <div class="modal fade" id="delete<?=$value->id_pelanggan?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1"><?=$value->nama_pelanggan?></h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
           
           
                
            <h5>Apakah Anda Yakin Untuk Menghapus User ini?</h5>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?=base_url('datapelanggan/delete/'.$value->id_pelanggan)?>" class="btn btn-primary">Delete</a>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <?php } ?>