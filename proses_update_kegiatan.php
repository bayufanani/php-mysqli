<?php
include 'koneksi.php';

$db = new DB;
$data = [
  'nama_kegiatan' => $_POST['nama_kegiatan'],
  'done' => 0
];
$menjalankan = $db->table('kegiatan')->update($data, 'id', $_POST['id']);
if ($menjalankan) {
  header('location: index.php');
}

echo $menjalankan;
