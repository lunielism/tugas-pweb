<!DOCTYPE html>
<html>
<head>
  <title>Aplikasi CRUD Plus Upload Gambar dengan PHP</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      background-image: linear-gradient(to bottom, #f9f9f9, #ececec);
      margin: 0;
      padding: 0;
    }

    .navbar {
      background-color: #ff8eb7;
      padding: 20px;
      color: #fff;
      text-align: center;
    }

    .navbar a {
      color: #fff;
      text-decoration: none;
      margin-right: 20px;
      font-weight: bold;
      position: relative;
      transition: color 0.3s ease;
    }

    .navbar a:before {
      content: "";
      position: absolute;
      width: 100%;
      height: 2px;
      bottom: -6px;
      left: 0;
      background-color: #fff;
      visibility: hidden;
      transform: scaleX(0);
      transition: transform 0.3s ease, visibility 0.3s ease;
    }

    .navbar a:hover {
      color: #ff6699;
    }

    .navbar a:hover:before {
      visibility: visible;
      transform: scaleX(1);
    }

    h1 {
      text-align: center;
      color: #333;
      padding: 40px 0;
      font-size: 32px;
      text-transform: lowercase;
      position: relative;
    }

    a {
      color: #fff;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #ff6699;
    }

    .btn-heart {
      display: inline-block;
      padding: 10px 20px;
      background-color: #ff8eb7;
      color: #fff;
      border-radius: 30px;
      border: none;
      font-weight: bold;
      font-size: 16px;
      text-transform: uppercase;
      position: relative;
      overflow: hidden;
      transition: background-color 0.3s ease;
    }

    .btn-heart:before,
    .btn-heart:after {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background-color: #ff6699;
      border-radius: 50%;
      opacity: 0;
      transform: scale(0.2);
      transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .btn-heart:before {
      z-index: 1;
    }

    .btn-heart:after {
      z-index: 2;
    }

    .btn-heart:hover {
      background-color: #ff6699;
    }

    .btn-heart:hover:before,
    .btn-heart:hover:after {
      opacity: 1;
      transform: scale(1);
    }

    table {
      width: 80%;
      margin: 0 auto;
      border-collapse: collapse;
      margin-top: 30px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }

    th, td {
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #ff8eb7;
      font-weight: bold;
      font-size: 14px;
      text-transform: uppercase;
      color: #fff;
    }

    tr:nth-child(even) {
      background-color: #f9cfd6;
    }

    img {
      max-width: 80px;
      max-height: 80px;
      border-radius: 50%;
      object-fit: cover;
    }

    td a {
      display: inline-block;
      padding: 6px 12px;
      background-color: #ff8eb7;
      color: #fff;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    td a:hover {
      background-color: #ff6699;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <a href="#">Beranda</a>
    <a href="#">Tentang</a>
    <a href="#">Kontak</a>
  </div>
  <h1>Data <span class="heart">Siswa</span></h1>
  <table border="1">
    <tr>
      <th>Foto</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Telepon</th>
      <th>Alamat</th>
      <th colspan="2">Aksi</th>
    </tr>
    <?php
    // Load file koneksi.php
    include "koneksi.php";

    // Buat query untuk menampilkan semua data siswa
    $sql = $pdo->prepare("SELECT * FROM siswa");
    $sql->execute(); // Eksekusi querynya

    while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
      echo "<tr>";
      echo "<td><img src='images/".$data['foto']."' alt='Foto Siswa'></td>";
      echo "<td>".$data['nis']."</td>";
      echo "<td>".$data['nama']."</td>";
      echo "<td>".$data['jenis_kelamin']."</td>";
      echo "<td>".$data['telp']."</td>";
      echo "<td>".$data['alamat']."</td>";
      echo "<td><a href='form_ubah.php?id=".$data['id']."'>Ubah</a></td>";
      echo "<td><a href='proses_hapus.php?id=".$data['id']."'>Hapus</a></td>";
      echo "</tr>";
    }
    ?>
  </table>
  <div style="text-align: center; margin-top: 20px;">
  <a href="form_simpan.php" class="btn-heart">Tambah Data</a>
  <a href="form_pdf.php" class="btn-heart">Unggah PDF</a>
</div>

</body>
</html>


