<?php
include '../../../public/script.php';
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TERMINAL BUS CILACAP</title>
</head>

<style>
      /* Style the navbar */
      .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: blue;
        /* Warna biru */
        color: white;
        padding: 10px 20px;
        /* Padding atas dan bawah disesuaikan */
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        /* Tambahkan shadow untuk efek visual */
        z-index: 1000;
    }

    /* Style the logo and website name */
    .logo img {
        width: 40px;
        /* Ukuran logo dikurangi */
        height: 40px;
        /* Ukuran logo dikurangi */
        margin-right: 10px;
    }

    /* Style the user section */
    .user {
        display: flex;
        align-items: center;
    }

    /* Style the dropdown button */
    .dropbtn {
        background-color: transparent;
        border: none;
        color: white;
        font-size: 16px;
        cursor: pointer;
        margin-left: 10px;
        /* Tambahkan margin antara dropdown dan username */
    }

    /* Dropdown content (hidden by default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 100px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        right: 0;
        /* Dropdown akan muncul di sebelah kanan */
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Style dropdown links */
    .dropdown-content a {
        color: black;
        padding: 8px 12px;
        /* Padding link dropdown disesuaikan */
        text-decoration: none;
        display: block;
    }

    /* Change dropdown link color on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

  .content {
    padding: 16px;
  }

  body {
    padding-top: 60px;
  }

  .footer {
    background-color: blue;
    color: white;
    text-align: center;
    padding: 10px;
  }
</style>

<body>
  <div>
    <nav class="navbar">
      <div class="logo">
        <img src="../../../public/asset/logo.png" alt="Logo">
        <span>Terminal Bus Cilacap</span>
      </div>
      <div class="user">
        <span id="username">agenbus</span>
        <div class="dropdown">
          <button onclick="toggleDropdown()" class="dropbtn">▼</button>
          <div id="dropdownContent" class="dropdown-content">
            <a href="../index.php" onclick="logout()">Logout</a>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <h3 class="text-center mt-3">Tambah Data Jumlah Penumpang</h3>
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
        <label class="form-label">Tahun</label>
        <input type="text" name="tahun" class="form-control">
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

  <div class="footer">
    &copy; 2023 Terminal Bus Cilacap
  </div>

</body>