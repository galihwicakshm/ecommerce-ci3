<div class="col-12">
            
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                  <?php 
                     $no = 0;
                    foreach ($rincianorder as $key => $value) { ?>
                 <?php if ( ++$no == 2) break; { ?>
                     <?php  } ?>
                    <i class="fas fa-clipboard-list"></i> <?=$value->no_order?>
                    <?php        } ?>

                    
                    <?php 
                     $no = 0;
                    foreach ($rincianorder as $key => $value) { ?>
                 <?php if ( ++$no == 2) break; { ?>
                     <?php  } ?>
                     
                    <small class="float-right">Tanggal Order : <?=$value->tanggal_order?></small>
                    <?php        } ?>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                <?php 
                $no = 0;
                    foreach ($rincianorder as $key => $value) { ?>
                 <?php if ( ++$no == 2) break; { ?>
                     <?php  } ?>
                    <h4> Pembeli : <?=$value->nama_penerima?></h4>
                <?php        } ?>
                </div>
                
              
              </div>
              <br>
              
                          <h5>Detail Barang Pembeli</h5>
                        
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped" >
                    <thead>
                    <tr>
                      <th>Jumlah Barang</th>
                      <th>Nama Barang</th>
                     
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($rincian as $key => $rincian) { ?>
                          <tr>
                              <td><?=$no++?></td>
                              <td><?=$rincian->nama_barang?></td>
                              <td><?=$rincian->qty?></td>
                              <td><?=$rincian->berat?> (Gr)</td>
                          </tr>

                       
                    <?php    } ?>
                            
                            
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

             
              <!-- /.row -->

          
              <h5>Detail Alamat Pembeli</h5>
      
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped" >
                    <thead>
                    <tr>
                      <th>Alamat Lengkap</th>
                      <th >Kode Pos</th>
                      <th>Ekspedisi
                      </th>
                    

                     
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                   
                    ?>
               
                   
                     
                      <tr>
                      <th ><?=$rincianorder->alamat?></th>
                      <th ><?=$rincianorder->kode_pos?></th>
                      <td ><b><?=strtoupper($rincianorder->ekspedisi)?></b><br>
                      Paket : <?=$rincianorder->paket?><br>
                      Ongkir Rp. <?=number_format($rincianorder->ongkir)?>
                      
                      </td>


                   
                    </tr>

              <?php      ?>
                            
                            
                  </table>
                </div>
                <!-- /.col -->
              </div>

           
              <!-- /.row -->

             
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="<?=base_url('rincian')?>" class="btn btn-success float-right"><i class="fas fa-reply"></i>
                    Kembali
                  </a>
                 
                  </a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->

        



