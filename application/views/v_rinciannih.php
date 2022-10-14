<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Rincian Barang</h3>

                
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered text-center" id="example1">
              
                    <thead class="text-center">
                        <tr>    
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>No Order</th>

                            <th>Jumlah</th>
                       </tr>   
                    </thead>
                     <tbody>
                            <?php 

                                      
                                        $no=1;
                                     
                                      foreach ($rinci as $key => $value) { ?>
                                <?php   if ($value->no_order==$rinci) { ?>
                                           <tr>
                                           <td ><?=$no++;?></td>
                                           <td ><?=$value->nama_barang?></td> 
                                           <td ><?=$value->no_order?></td> 
                                           <td ><?=$value->qty?></td>
                                           </tr>
                                   <?php   } ?>
                                       
                                      
                                   
                                
                                        
                                        <?php } ?>
                                      
                    </tbody>
                </table>
           
              </div>

              

            </div>
            </div>
</div>

<div class="col-md-12 text-center">
            <div class="card card-primary text-center">
              <div class="card-header text-center">
               <center> <h3 class="card-title text-center">Rincian Alamat</h3></center>

                
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body text-center">
              <table class="table table-bordered text-center" id="example1">
              
                    <thead class="text-center">
                        <tr>    
                            <th>Nama Penerima</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>Provinsi</th>
                            <th>Kode Pos</th>
                            <th>Ekspedisi</th>
                            <th>Paket</th>



                       </tr>   
                    </thead>
                     <tbody>
                   
                          
                                    <?php  foreach ($rinci as $key => $value) { ?>
                                        <?php if ($value->no_order=='20210523HYEJTNNM') { ?>
                                        <td ><?=$value->nama_penerima?></td>
                                        <td ><?=$value->alamat?></td>
                                        <td ><?=$value->kota?></td> 
                                        <td ><?=$value->provinsi?></td>
                                        <td ><?=$value->kode_pos?></td>
                                        <td ><?=strtoupper($value->ekspedisi)?></td>
                                        <td ><?=$value->paket?></td>


                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                    </tbody>
                </table>

              </div>

              

            </div>
            </div>
</div>

