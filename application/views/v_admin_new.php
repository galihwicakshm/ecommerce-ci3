<h3>Dashboard</h3>
<div class="row">
<div class="col-3">
              <div class="card">
                <div class="card-body">
                <h5>Total Barang</h5>
             <h4>    <?=$total_barang?></h4>
              <a href="<?=base_url('barang')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          </div>


          <div class="col-3">
              <div class="card">
                <div class="card-body">
                <h5>Total Pelanggan</h5>
             <h4>    <?=$pelanggan?></h4>
              <a href="<?=base_url('datapelanggan')?>" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
          </div>


   <div class="col-3">
              <div class="card">
                <div class="card-body">
                <h5>Total Kategori</h5>
             <h4>    <?=$kategori?></h4>
              <a href="<?=base_url('kategori')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
          </div>
</div>