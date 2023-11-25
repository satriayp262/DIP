<?php
include '../../../public/script.php';
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TERMINAL BUS CILACAP</title>
</head>

<h3 class="text-center mt-5">Tambah Data Penumpang</h3>
<div class="card px-3 py-3" style="margin: 25px auto; padding: 20px; max-width:400px">
  <form action="proses_pnp.php?aksi=tambah" method="post">
    <div class="mb-3">
      <label class="form-label">Nama PO</label>
      <input type="text" name="nama_po" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Bulan</label>
      <input type="text" name="bulan" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Jumlah</label>
      <input type="text" name="jumlah" class="form-control">
    </div>
    <div class="d-flex justify-content-between">
      <a href="tampil_pnp.php" class="btn btn-secondary w-100 mx-2">Kembali</a>
      <button type="submit" class="btn btn-primary w-100 mx-2">Submit</button>
    </div>
  </form>
</div>