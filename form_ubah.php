<html>
<head>
  <title>Aplikasi CRUD dengan PHP</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      background-image: linear-gradient(to bottom, #f9f9f9, #ececec);
      margin: 0;
      padding: 0;
    }

    h1 {
      text-align: center;
      color: #333;
      padding: 40px 0;
      font-size: 32px;
      text-transform: lowercase;
      position: relative;
    }

    form {
      width: 60%;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    table {
      width: 100%;
    }

    td {
      padding: 8px;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="radio"] {
      margin-right: 5px;
    }

    input[type="submit"],
    input[type="button"] {
      padding: 10px 20px;
      background-color: #ff8eb7;
      color: #fff;
      border-radius: 4px;
      border: none;
      font-weight: bold;
      font-size: 16px;
      text-transform: uppercase;
      margin-top: 20px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover,
    input[type="button"]:hover {
      background-color: #ff6699;
    }
  </style>
</head>
<body>
  <h1>Ubah Data Siswa</h1>

  <?php
  // Load file koneksi.php
  include "koneksi.php";

  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $id = $_GET['id'];

  // Query untuk menampilkan data siswa berdasarkan ID yang dikirim
  $sql = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
  $sql->bindParam(':id', $id);
  $sql->execute(); // Eksekusi query insert
  $data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql
  ?>

  <form method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
    <table cellpadding="8">
      <tr>
        <td>NIS</td>
        <td><input type="text" name="nis" value="<?php echo $data['nis']; ?>"></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>
        <?php
        if($data['jenis_kelamin'] == "Laki-laki"){
          echo "<input type='radio' name='jenis_kelamin' value='laki-laki' checked='checked'> Laki-laki";
          echo "<input type='radio' name='jenis_kelamin' value='perempuan'> Perempuan";
        }else{
          echo "<input type='radio' name='jenis_kelamin' value='laki-laki'> Laki-laki";
          echo "<input type='radio' name='jenis_kelamin' value='perempuan' checked='checked'> Perempuan";
        }
        ?>
        </td>
      </tr>
      <tr>
        <td>Telepon</td>
        <td><input type="text" name="telp" value="<?php echo $data['telp']; ?>"></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><textarea name="alamat"><?php echo $data['alamat']; ?></textarea></td>
      </tr>
      <tr>
        <td>Foto</td>
        <td>
          <input type="file" name="foto">
        </td>
      </tr>
    </table>

    <hr>
    <input type="submit" value="Ubah">
    <a href="index.php"><input type="button" value="Batal"></a>
  </form>
</body>
</html>
