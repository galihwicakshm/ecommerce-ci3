

<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Kategori</h3>

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
                <table class="table" id="example1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; 
                        foreach ($kategori as $key => $value){ ?>

                      
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $value->nama_kategori?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?=
                                $value->id_kategori?>"><i class="fas fa-user-edit"></i> Edit</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?=
                                $value->id_kategori?>"><i class="fas fa-trash"></i> Delete</button>


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


 <div class="modal fade" id="add" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Tambah Kategori</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                     <?php
               echo form_open('kategori/add');
                ?>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Nama Kategori</label>
                                  <input type="text" name="nama_kategori" class="form-control" placeholder="Input Nama Kategori" required>
                                  </div>
                                </div>
                               
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                   <?php
                echo form_close();
              ?>
                              </div>
                            </div>
                          </div>
                          </div>

        
      


                        <!-- Modal -->
                              <?php foreach ($kategori as $key => $value){ ?>

                        <div class="modal fade" id="edit<?=$value->id_kategori?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Edit Kategori</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                   <?php
                echo form_open('kategori/edit/'.$value->id_kategori);
                ?>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" value="<?=$value->nama_kategori?>" class="form-control" placeholder="Nama User" required>
                                  </div>
                                </div>
                               
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                 <?php
                echo form_close();
                ?>
                              </div>
                            </div>
                          </div>
                          </div>
                             <?php } ?>






      


<?php foreach ($kategori as $key => $value){ ?>

 <div class="modal fade" id="delete<?=$value->id_kategori?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1"><?= $value-> nama_kategori?></h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <h5>Apakah Anda Yakin Untuk Menghapus Kategori ini?</h5>
                              </div>
                              <div class="modal-footer">
                               <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                             <a href="<?=base_url('kategori/delete/'.$value->id_kategori)?>" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

  <?php } ?>
