<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Rincian Orderan</h3>

                
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
            
              <div class="card-body">
              <div class="col-sm-8">
            
              <?php  foreach ($rinci as $key => $value) { ?>
                <div class="row">
                      <div class="form-group mt-3">
                        <label>No Order</label>
                        <input name="no_order" class="form-control" value="">
                        </div>
                      
                        <div class="form-group mt-5 ml-3">
                                      <a href="<?= base_url('order/orderan/'.$value->no_order)?>" class="btn btn-warning"><i class="fas fa-user-edit"></i></a>
                                      </div>
                                      </div>
                                   
                        <?php  } ?>
                            
                        
                           
               
                       

            </div>
              </div>
         
            </div>
</div>
