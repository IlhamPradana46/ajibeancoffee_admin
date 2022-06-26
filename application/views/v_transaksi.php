<body>
<div class="container">
    <button type="button" class="btn btn-success btn-sm mt-3" data-toggle="modal" data-target="#tambahtransaksi">
    <i class="fa-solid fa-plus" style="color:white;"></i> Tambah
    </button>
    <div class="modal fade" id="tambahtransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1><strong>TAMBAH TRANSAKSI</strong></h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <?php echo form_open(base_url().'produk/add_transaksi_action'); ?>
                    <div class="form-group">
                        <label for="customer">Nama Customer</label>
                        <input name="customer" type="text" class="form-control" id="customer" placeholder="Masukan Nama Customer">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Produk</label>
                        <select name="produk" class="form-control" id="nama">
                            <option value="">-Pilih Produk</option>
                            <?php foreach($produk as $p){ ?>
                            <option value="<?php echo $p->id_produk; ?>"><?php echo $p->nama_produk; ?></option>
                            <?php } ?>
                        </select>
                            <?php echo form_error('produk'); ?>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Jumlah</label>
                        <input name="quantity" type="number" class="form-control" id="quantity">
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

    <div class=" table-responsive mt-3">
    <table class="table table-sm table-bordered table-striped" id="tabeluser">
		<thead>
			<tr>
				<th>No</th>
                <th>Customer</th>
                <th>Produk</th>
				<th>Harga</th>
                <th>Jumlah</th>
				<th>Total Harga</th>
                <th>Tanggal</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach($transaksi as $t){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
                    <td><?php echo $t->nama_customer ?></td>
					<td><?php echo $t->nama_produk ?></td>
					<td>Rp.<?php echo number_format($t->harga)?></td>
					<td><?php echo $t->quantity ?></td>
					<td>Rp.<?php echo number_format($t->total_harga)?></td>
                    <td><?php echo date('d/m/Y',strtotime($t->tanggal_transaksi)); ?></td>
					<td>
						<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edittransaksi<?= $t->id_transaksi ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
						<a class="btn btn-danger btn-sm" href="<?php echo base_url().'produk/transaksi_delete/'.$t->id_transaksi; ?>"><i class="fa-solid fa-trash-can" style="color:white;"></i> Hapus</a>
					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
    </div>
        <?php foreach ($transaksi as $t) {?>
        <div class="modal fade" id="edittransaksi<?= $t->id_transaksi;?>" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
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
                        <?php echo form_open_multipart(base_url().'produk/update_transaksi'); ?>
                            <input type="hidden" name="id_produk" id="id_produk" value="<?= $t->produk_transaksi ?>">
                            <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $t->id_transaksi ?>">
                            <div class="form-group">
                                <label for="customer">Nama Customer</label>
                                <input name="customer" type="text" class="form-control" id="customer" value="<?= $t->nama_customer ?>" >
                            </div>  
                            <div class="form-group">
                                <label for="namaproduk">Nama Produk</label>
                                <select name="produk" class="form-control" id="namaproduk">
                                    <option value="">-Pilih Produk</option>
                                    <?php foreach($produk as $p){ ?>
                                    <option value="<?php echo $p->id_produk; ?>"><?php echo $p->nama_produk; ?></option>
                                    <?php } ?>
                                </select>
                                    <?php echo form_error('produk'); ?>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Jumlah</label>
                                <input name="quantity" type="number" class="form-control" id="quantity" value="<?= $t->quantity ?>">
                            </div>
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
        <?php }?>
</div>
</body>
<br>
<br>
<br>
<br>