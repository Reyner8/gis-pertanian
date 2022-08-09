<?php

class user extends CI_Model
{
   public function getBerita()
   {
      return $this->db->query("SELECT * FROM berita")->result();
   }

   public function getBeritaById($id)
   {
      return $this->db->query("SELECT * FROM berita WHERE id = '$id'")->result();
   }

   public function getLokasi()
   {
      return $this->db->query("SELECT * FROM kelompok_tani")->result();
   }

   public function getKelompokTaniById($id)
   {
      return $this->db->query("SELECT * FROM kelompok_tani WHERE kelompok_tani.id = '$id'")->row();
   }

   public function getGaleriByIdKelompok($id)
   {
      return $this->db->query("SELECT * FROM galeri WHERE galeri.id_kelompok = '$id'")->result();
   }

   public function getHasilByIdKelompok($id)
   {
      return $this->db->query("SELECT * FROM hasil_panen WHERE hasil_panen.id_kelompok = '$id'")->result();
   }

   public function getKelurahan()
   {
      return $this->db->query("SELECT * FROM kelurahan")->result();
   }

   public function getSaran()
   {
      return $this->db->query("SELECT * FROM saran ORDER BY id DESC")->result();
   }


   public function insert($data)
   {
      $this->db->insert('saran', $data);
   }
}
