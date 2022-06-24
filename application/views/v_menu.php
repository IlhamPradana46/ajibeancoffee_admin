<body>
<div class="container" style="">
    <div class="container">
    <a href="<?php echo base_url().'dashboard/add_menu' ?>" class="btn btn-success mt-3">TAMBAH DAFTAR MENU</a>
    <div class="row mt-3">
    <?php foreach($produk as $p){	?>
        <div class="col-md-3 mt-3">
            <div class="card border-dark">
              <img src="<?php echo base_url().'upload/'.$p->gambar ?>" class="card-img-top" alt="...">
              <div class="card-body">
               <h5 class="card-title font-weight-bold"><?php echo $p->nama_produk ?></h5>
               <label class="card-text harga">Stok <?php echo $p->stok ?></label><br>
               <label class="card-text harga">Rp. <?php echo number_format($p->harga, 2, ",", ".");?></label><br>
               <button class="btn btn-success btn-outline-dark text-white">EDIT</button> <button class="btn btn-danger btn-outline-dark text-white">DELETE</button>
              </div>
            </div>
        </div>
        <?php } ?>
    </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
</body>