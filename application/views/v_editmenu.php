<div class="container mt-5">
<h1 class="text-center"><strong>EDIT PRODUK</strong></h1>
<?php foreach($produk as $p){	?>
<?php echo form_open_multipart(base_url().'produk/update_produk'); ?>
		<input type="hidden" name="id_produk" value="<?=$p->id_produk?>">
		<div class="form-group">
			<label for="nama">Nama Produk</label>
			<input name="nama" type="text" class="form-control" id="nama" placeholder="Input nama produk" value="<?=$p->nama_produk?>">
		</div>
		<div class="form-group">
			<label for="stok">Stok</label>
			<input name="stok" type="number" class="form-control" id="stok" value="<?=$p->stok?>">
		</div>
		<div class="form-group">
			<label for="harga">Harga</label>
			<input name="harga" type="number" class="form-control" id="harga" value="<?=$p->harga?>">
		</div>
		<div class="form-group">
			<label for="gambar">Gambar</label>
			<input name="gambarbaru" type="file" class="form-control-file" id="file">
		</div>
		<!-- file lama -->
		<input type="hidden" name="gambarlama" value="<?=$p->gambar?>">
		<div>
			<input class="btn btn-primary btn-outline-light" type="submit" value="SIMPAN">
		</div>
<?php echo form_close() ?>
<?php } ?>
</div class="pb-5">
<br>
<br>
<br>
<br>
<br>
<br>
<br>