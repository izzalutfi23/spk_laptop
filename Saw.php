<?php

/**
 *
 */
class Saw
{
  private $db;
  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;dbname=spk_laptop', "root", "");
  }

  // Kategori
  public function get_data_kategori(){
    $stmt = $this->db->prepare("SELECT*FROM kategori_saw");
    $stmt->execute();
    return $stmt;
  }

  public function del_kat($id_kategori)
  {
      $query = $this->db->prepare("DELETE FROM kategori_saw where id_kategori=?");
      $query->bindParam(1, $id_kategori);
      $query->execute();
      return $query->rowCount();
  }
  // End kategori

  public function get_data_kriteria(){
    $stmt = $this->db->prepare("SELECT*FROM kriteria_saw ORDER BY id_kriteria");
    $stmt->execute();
		return $stmt;
  }

  public function get_data_kriteria_id($id){
    $stmt = $this->db->prepare("SELECT*FROM kriteria_saw WHERE id_kriteria='$id' ORDER BY id_kriteria");
    $stmt->execute();
		return $stmt;
  }

  public function kriteria_by_id($id){
    $stmt = $this->db->prepare("SELECT*FROM kriteria_saw WHERE id_kriteria='$id'");
    $stmt->execute();
		return $stmt->fetch();
  }

  public function kriteria_update($nama_kriteria,$jenis,$bobot, $id){
    $query = $this->db->prepare('UPDATE kriteria_saw set nama_kriteria=?,jenis=?,bobot=? where id_kriteria=?');
    $query->bindParam(1, $nama_kriteria);
    $query->bindParam(2, $jenis);
    $query->bindParam(3, $bobot);
    $query->bindParam(4, $id);
    $query->execute();
    return $query->rowCount();
  }

  public function del_k($id_kriteria)
  {
      $query = $this->db->prepare("DELETE FROM kriteria_saw where id_kriteria=?");
      $query->bindParam(1, $id_kriteria);
      $query->execute();
      return $query->rowCount();
  }

  public function get_data_alternatif(){
    $stmt = $this->db->prepare("SELECT*FROM alternatif_saw ORDER BY id_alternatif");
    $stmt->execute();
    return $stmt;
  }

  public function alternatif_by_id($id){
    $stmt = $this->db->prepare("SELECT*FROM alternatif_saw WHERE id_alternatif='$id'");
    $stmt->execute();
		return $stmt->fetch();
  }

  public function alternatif_by_idkat($id){
    $stmt = $this->db->prepare("SELECT*FROM alternatif_saw WHERE id_kategori='$id'");
    $stmt->execute();
		return $stmt;
  }

  public function alternatif_update($nama_alternatif, $id){
    $query = $this->db->prepare('UPDATE alternatif_saw set nama_alternatif=? where id_alternatif=?');
    $query->bindParam(1, $nama_alternatif);
    $query->bindParam(2, $id);
    $query->execute();
    return $query->rowCount();
  }

  public function del_a($id_alternatif)
  {
      $query = $this->db->prepare("DELETE FROM alternatif_saw where id_alternatif=?");
      $query->bindParam(1, $id_alternatif);
      $query->execute();
      return $query->rowCount();
  }

  public function del_nilai($id_penilaian)
  {
      $query = $this->db->prepare("DELETE FROM nilai_saw where id_alternatif=?");
      $query->bindParam(1, $id_penilaian);
      $query->execute();
      return $query->rowCount();
  }

  public function get_data_nilai_id($id){
    $stmt = $this->db->prepare("SELECT*FROM nilai_saw WHERE id_alternatif='$id' ORDER BY id_kriteria");
    $stmt->execute();
    return $stmt;
  }

  public function nilai_max($id){
    $stmt = $this->db->prepare("SELECT id_kriteria, MAX(nilai) AS max FROM nilai_saw WHERE id_kriteria='$id' GROUP BY id_kriteria");
    $stmt->execute();
    return $stmt;
  }

  public function nilai_min($id){
    $stmt = $this->db->prepare("SELECT id_kriteria, MIN(nilai) AS min FROM nilai_saw WHERE id_kriteria='$id' GROUP BY id_kriteria");
    $stmt->execute();
    return $stmt;
  }

}

 ?>
