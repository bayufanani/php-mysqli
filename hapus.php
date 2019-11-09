<?php
include 'koneksi.php';

$db = new DB();
$menjalankan = $db->table('kegiatan')->delete('id', $_GET['id']);
if ($menjalankan) {
  header('location: index.php');
}
echo $menjalankan;
