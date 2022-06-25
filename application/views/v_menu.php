<body>
<div class="container" style="">
    <div class="container">
        <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#exampleModal">
        TAMBAH DAFTAR MENU
        </button>

    <!-- Modal Tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1><strong>TAMBAH PRODUK</strong></h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <?php echo form_open_multipart(base_url().'produk/do_upload'); ?>
                    <div class="form-group">
                        <label for="nama">Nama Produk</label>
                        <input name="nama" type="text" class="form-control" id="nama" placeholder="Input nama produk">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input name="stok" type="number" class="form-control" id="stok">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input name="harga" type="number" class="form-control" id="harga">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input name="gambar" type="file" class="form-control-file" id="file">
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                        <input class="btn btn-primary btn-outline-light" type="submit" value="SIMPAN">
                    </div>
            <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah -->

    <div class="row mt-3">
    <?php foreach($produk as $p){	?>
        <div class="col-md-3 mt-3">
            <div class="card border-dark">
              <img src="<?php echo base_url().'upload/images/'.$p->gambar ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold"><?php echo $p->nama_produk ?></h5>
                    <label class="card-text harga">Stok <?php echo $p->stok ?></label><br>
                    <label class="card-text harga">Rp. <?php echo number_format($p->harga, 2, ",", ".");?></label><br>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEdit<?= $p->id_produk ?>">Edit </button>
                    <a href="<?php echo base_url().'produk/delete_produk/'.$p->id_produk; ?>" class="btn btn-danger btn-outline-dark text-white">DELETE</a>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
        <!-- Modal Ubah -->
        <?php $no = 0 ?>
        <?php foreach ($produk as $p) : $no++ ?>
        <div class="modal fade" id="modalEdit<?= $p->id_produk; ?>" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1><strong>EDIT PRODUK</strong></h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- <?php //foreach($produk as $p){	?> -->
                        <?php echo form_open_multipart(base_url().'produk/update_produk'); ?>
                            <input type="hidden" name="id_produk" id="id_produk" value="<?= $p->id_produk ?>">
                            <div class="form-group">
                                <label for="nama">Nama Produk</label>
                                <input name="nama" type="text" class="form-control" id="nama" placeholder="Input nama produk" value="<?= $p->nama_produk ?>" >
                            </div>  
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input name="stok" type="number" class="form-control" id="stok" value="<?= $p->stok ?>">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input name="harga" type="number" class="form-control" id="harga" value="<?= $p->harga ?>">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input name="gambarbaru" type="file" class="form-control-file" id="file">
                            </div>
                            <!-- file lama -->
                            <input type="hidden" name="gambarlama" value="<?= $p->gambar ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                <input class="btn btn-primary btn-outline-light" type="submit" value="SIMPAN">
                            </div>
                        <?php echo form_close() ?>
                    <!-- <?php // } ?> -->
                </div>
            </div>
        </div>
        <?php endforeach ?>
        <!-- End Modal Ubah -->
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
</body>