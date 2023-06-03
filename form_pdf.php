<?php
require('C:\xampp\htdocs\daftarpdf\fpdf\fpdf.php');

class PDF extends FPDF
{
  // Fungsi untuk membuat header halaman
  function Header()
  {  // Judul
    $this->SetFont('Arial', 'B', 14);
    $this->Cell(0, 10, 'Data Siswa', 0, 1, 'C');
    // Garis pembatas
    $this->Line(5, 30, 290, 30);
    $this->Ln(10);
  }

  // Fungsi untuk membuat footer halaman
  function Footer()
  {
    // Posisi di bawah
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial', 'I', 8);
    // Halaman
    $this->Cell(0, 10, 'Halaman ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
  }
}

// Load file koneksi.php
include "koneksi.php";

// Buat objek PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4'); // Mengatur ukuran halaman menjadi landscape (L) dan ukuran A4

// Mengatur posisi tabel di tengah halaman
$pdf->SetXY(10, 40);

// Buat header kolom
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'NIS', 1, 0, 'C');
$pdf->Cell(70, 10, 'Nama', 1, 0, 'C');
$pdf->Cell(40, 10, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(40, 10, 'Telepon', 1, 0, 'C');
$pdf->Cell(100, 10, 'Alamat', 1, 1, 'C');

// Buat query untuk menampilkan semua data siswa
$sql = $pdo->prepare("SELECT * FROM siswa");
$sql->execute(); // Eksekusi querynya

// Tampilkan data siswa
$pdf->SetFont('Arial', '', 12);
while ($data = $sql->fetch()) { // Ambil semua data dari hasil eksekusi $sql
  $pdf->SetX(10); // Kembali ke posisi awal kolom
  $pdf->Cell(30, 10, $data['nis'], 1, 0, 'C');
  $pdf->Cell(70, 10, $data['nama'], 1, 0, 'C');
  $pdf->Cell(40, 10, $data['jenis_kelamin'], 1, 0, 'C');
  $pdf->Cell(40, 10, $data['telp'], 1, 0, 'C');
  $pdf->Cell(100, 10, $data['alamat'], 1, 1, 'L');
}

// Output file PDF
$pdf->Output();
?>


