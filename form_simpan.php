<!DOCTYPE html>
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
      width: 80%;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    table {
      width: 100%;
    }

    td {
      padding: 8px;
    }

    input[type="text"],
    input[type="file"],
    textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="radio"] {
      margin-right: 5px;
    }

    hr {
      margin-top: 20px;
      border: none;
      border-top: 1px solid #ccc;
    }

    input[type="submit"],
    input[type="button"] {
      padding: 10px 20px;
      background-color: #ff8eb7;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-weight: bold;
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
  <h1>Tambah Data Siswa</h1>
  <form method="post" action="proses_simpan.php" enctype="multipart/form-data">
    <table cellpadding="8">
      <tr>
        <td>NIS</td>
        <td><input type="text" name="nis"></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td><input type="text" name="nama"></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>
          <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
          <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
        </td>
      </tr>
      <tr>
        <td>Telepon</td>
        <td><input type="text" name="telp"></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><textarea name="alamat"></textarea></td>
      </tr>
      <tr>
        <td>Foto</td>
        <td><input type="file" name="foto"></td>
      </tr>
    </table>
  
    <hr>
    <input type="submit" value="Simpan">
    <a href="index.php"><input type="button" value="Batal"></a>
  </form>
</body>
</html>
