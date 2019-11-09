<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tambah Kegiatan</title>
</head>

<body>
  <form action="proses_update_kegiatan.php" method="post">
    <?php
    include 'koneksi.php';
    $db = new DB();
    $data = $db->table('kegiatan')->getOne('id', $_GET['id']);
    ?>
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <input type="text" name="nama_kegiatan" value="<?= $data['nama_kegiatan'] ?>"><br />
    <button type="submit">Simpan</button>
  </form>
</body>

</html>