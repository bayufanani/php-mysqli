<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Index</title>
</head>

<body>
  <?php
  include 'koneksi.php';
  $db = new DB();
  $data = $db->table('kegiatan')->getAll();
  ?>
  <a href="tambah.php">Tambah kegiatan</a>
  <ul>
    <?php foreach ($data as $row) : ?>
      <li><?= $row['nama_kegiatan'] ?> <a href="edit.php?id=<?= $row['id'] ?>">edit</a> | <a href="hapus.php?id=<?= $row['id'] ?>">hapus</a></li>
    <?php endforeach ?>
  </ul>
</body>

</html>