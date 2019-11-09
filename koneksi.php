<?php
class DB
{
  private $koneksi;
  private $host = "localhost";
  private $user = "root";
  private $passwd = "";
  private $db = "kegiatanku";
  private $namaTabel;

  public function __construct()
  {
    $this->koneksi = mysqli_connect($this->host, $this->user, $this->passwd, $this->db);

    if (mysqli_connect_errno()) {
      echo "Koneksi database gagal : " . mysqli_connect_error();
      exit;
    }
  }

  public function table($namaTable)
  {
    $this->namaTabel = $namaTable;
    return $this;
  }

  public function queryManual($sql, $hasResult = true)
  {
    $query = mysqli_query($this->koneksi, $sql);

    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    if (!$query) {
      return "Error menjalankan perintah sql dengan pesan: " . mysqli_error($this->koneksi);
    }
    if (!$hasResult) {
      return $query;
    }
    return $data;
  }

  public function getAll()
  {
    $sql = "SELECT * FROM {$this->namaTabel}";
    return $this->queryManual($sql);
  }

  public function getOne($columnPrimary, $valuePrimary)
  {
    $sql = "SELECT * FROM {$this->namaTabel} WHERE {$columnPrimary}='{$valuePrimary}' LIMIT 1";
    return $this->queryManual($sql)[0];
  }

  public function insert($dataArray)
  {
    $columns = implode(',', array_keys($dataArray));
    $values = "'" . implode("', '", $dataArray) . "'";
    $sql = "INSERT INTO {$this->namaTabel}($columns) VALUES($values)";

    $tereksekusi = mysqli_query($this->koneksi, $sql);
    if (!$tereksekusi) {
      return "Error menjalankan perintah sql dengan pesan: " . mysqli_error($this->koneksi);
    }
    return $tereksekusi;
  }

  public function update($dataArray, $columnsPrimary, $valuePrimary)
  {
    $index = 0;
    $columnValue = "";
    foreach ($dataArray as $column => $value) {
      if ($index != 0) {
        $columnValue .= ", ";
      }
      $columnValue .= "{$column}='{$value}'";
      $index++;
    }
    $sql = "UPDATE {$this->namaTabel} SET {$columnValue} WHERE {$columnsPrimary}='{$valuePrimary}'";

    $tereksekusi = mysqli_query($this->koneksi, $sql);
    if (!$tereksekusi) {
      return "Error menjalankan perintah sql dengan pesan: " . mysqli_error($this->koneksi);
    }
    return $tereksekusi;
  }

  public function delete($columnPrimary, $valuePrimary)
  {
    $sql = "DELETE FROM {$this->namaTabel} WHERE {$columnPrimary}='{$valuePrimary}'";

    $tereksekusi = mysqli_query($this->koneksi, $sql);
    if (!$tereksekusi) {
      return "Error menjalankan perintah sql dengan pesan: " . mysqli_error($this->koneksi);
    }
    return $tereksekusi;
  }
}
