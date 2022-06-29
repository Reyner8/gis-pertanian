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
      return $this->db->query("SELECT DISTINCT dokter.id AS idDokter, dokter.nama AS namaDokter, dokter.bpjs,dokter.foto, 
        lokasi.id AS idLokasi, lokasi.latitude,lokasi.longitude,lokasi.alamat,lokasi.nama_tempat,
        spesialis.id AS idSpesialis, spesialis.nama AS namaSpesialis, icon,
        kelurahan.id AS idKelurahan
        FROM praktik,dokter,lokasi,spesialis,kelurahan
        WHERE dokter.id = praktik.id_dokter AND 
        lokasi.id = praktik.id_lokasi AND kelurahan.id = lokasi.id_kelurahan AND dokter.id_spesialis = spesialis.id")->result();
   }

   public function getDokter()
   {
      return $this->db->query("SELECT spesialis.nama AS namaSpesialis, dokter.nama AS namaDokter, dokter.id AS idDokter,bpjs,dokter.foto,spesialis.id FROM dokter,spesialis WHERE dokter.id_spesialis = spesialis.id")->result();
   }

   public function getDokterById($id)
   {
      return $this->db->query("SELECT 
        dokter.id AS idDokter, dokter.nama AS namaDokter, dokter.bpjs,dokter.foto,dokter.id_spesialis,telepon, 
        praktik.id AS idPraktik,praktik.id_dokter,praktik.id_lokasi, 
        lokasi.id AS idLokasi, lokasi.latitude,lokasi.longitude,lokasi.nama_tempat, lokasi.alamat, 
        kelurahan.id AS idKelurahan, kelurahan.nama AS namaKelurahan, kecamatan.nama AS namaKecamatan, kecamatan.id AS idKecamatan,
        spesialis.id AS idSpesialis, spesialis.nama AS namaSpesialis
        FROM praktik,dokter,lokasi,spesialis,kecamatan,kelurahan
        WHERE dokter.id = praktik.id_dokter AND 
        lokasi.id = praktik.id_lokasi AND dokter.id_spesialis = spesialis.id AND lokasi.id_kelurahan = kelurahan.id AND kelurahan.id_kecamatan = kecamatan.id AND dokter.id = $id")->result();
   }

   public function getJadwalByIdDokter($id)
   {
      return $this->db->query("SELECT lokasi.id AS idLokasi,hari,jam_buka,jam_tutup,nama_tempat,alamat FROM praktik,lokasi WHERE praktik.id_lokasi = lokasi.id AND id_dokter = $id")->result();
   }

   public function getJadwalByIdDokter2($id)
   {
      return $this->db->query("SELECT DISTINCT nama_tempat,praktik.id_lokasi FROM praktik,lokasi WHERE praktik.id_lokasi = lokasi.id AND id_dokter = $id")->result();
   }

   public function getGaleri($id)
   {
      return $this->db->query("SELECT nama, nama_tempat FROM lokasi,galeri WHERE lokasi.id = galeri.id_lokasi AND galeri.id_lokasi = $id")->result();
   }

   public function getJadwalByIdDokter3($id)
   {
      return $this->db->query("SELECT DISTINCT alamat, nama_tempat,apotik,wifi,ac,ruang_asi,ruang_tunggu,nebulizer FROM praktik,lokasi WHERE praktik.id_lokasi = lokasi.id AND id_dokter = $id")->result();
   }

   public function getSpesialis()
   {
      return $this->db->query("SELECT * FROM spesialis")->result();
   }

   public function getKelurahan()
   {
      return $this->db->query("SELECT * FROM kelurahan")->result();
   }

   public function getLokasiDetailById($id)
   {
      return $this->db->query("SELECT DISTINCT galeri.nama AS fotoLokasi,lokasi.id AS idLokasi, kelurahan.nama AS namaKelurahan, kecamatan.nama AS namaKecamatan FROM praktik,lokasi,galeri,kelurahan,kecamatan WHERE praktik.id_lokasi = lokasi.id AND lokasi.id_kelurahan = kelurahan.id AND kelurahan.id_kecamatan = kecamatan.id AND lokasi.id = galeri.id_lokasi AND praktik.id_dokter = '$id'")->result();
   }

   public function getSaran()
   {
      return $this->db->query("SELECT * FROM saran ORDER BY id DESC")->result();
   }

   public function getDokterByName($name)
   {
      return $this->db->query("SELECT spesialis.nama AS namaSpesialis, dokter.nama AS namaDokter, dokter.id AS idDokter,bpjs,dokter.foto,spesialis.id FROM dokter,spesialis WHERE dokter.id_spesialis = spesialis.id AND dokter.nama LIKE '%$name%'")->result();
   }

   public function insert($data)
   {
      $this->db->insert('saran', $data);
   }
}
