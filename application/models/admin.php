<?php

class admin extends CI_Model
{
    public function getAdmin($email)
    {
        return $this->db->query("SELECT * FROM admin WHERE email = '$email'")->result();
    }

    public function getKelompokTaniById($id)
    {
        return $this->db->query("SELECT 
        kelompok_tani.*, kelurahan.nama AS namaKelurahan, kecamatan.nama AS namaKecamatan
        FROM kelompok_tani, kecamatan, kelurahan
        WHERE kelompok_tani.id_kelurahan = kelurahan.id AND 
        kelurahan.id_kecamatan = kecamatan.id AND
        kelompok_tani.id = $id")->row();
    }

    public function getKelompokTaniByIdAnggota($id)
    {
        return $this->db->query("SELECT * FROM anggota WHERE id = '$id'")->row();
    }

    public function getKelompokTaniByGaleri($id)
    {
        return $this->db->query("SELECT * FROM galeri WHERE id = '$id'")->row();
    }

    public function getDokterByNameLike($name)
    {
        return $this->db->query("SELECT * FROM dokter WHERE nama = '$name'")->row();
    }

    public function getDokterByName($name)
    {
        return $this->db->query("SELECT * FROM kelompok_tani WHERE kelompok_tani.nama LIKE '%$name%'")->result();
    }

    public function getDokterDetailLokasi($id)
    {
        return $this->db->query("SELECT DISTINCT nama_tempat,alamat,praktik.id FROM praktik,lokasi WHERE praktik.id_lokasi = lokasi.id AND id_dokter = $id")->result();
    }

    public function getDokterDetailAlamat($id)
    {
        return $this->db->query("SELECT DISTINCT alamat, nama_tempat,apotik FROM praktik,lokasi WHERE praktik.id_lokasi = lokasi.id AND id_dokter = $id")->result();
    }

    public function getJadwalByIdDokter2($id)
    {
        return $this->db->query("SELECT DISTINCT nama_tempat FROM praktik,lokasi WHERE praktik.id_lokasi = lokasi.id AND id_dokter = $id")->result();
    }

    // detail dokter
    public function getDetailDokterById($idDokter)
    {
        return $this->db->query("SELECT dokter.*, spesialis.nama AS namaSpesialis FROM dokter,spesialis WHERE dokter.id_spesialis = spesialis.id AND dokter.id = $idDokter")->row();
    }

    public function getDetailLokasi($idDokter)
    {
        return $this->db->query("SELECT DISTINCT id_lokasi, nama_tempat, alamat,apotik,wifi,ac,ruang_asi,ruang_tunggu,nebulizer FROM praktik,lokasi WHERE praktik.id_lokasi = lokasi.id AND praktik.id_dokter = $idDokter")->result();
    }

    public function getDetailJadwal($idDokter)
    {
        return $this->db->query("SELECT * FROM praktik WHERE praktik.id_dokter = $idDokter")->result();
    }

    public function getSpesialis()
    {
        return $this->db->query("SELECT * FROM spesialis")->result();
    }

    public function getSpesialisById($id)
    {
        return $this->db->query("SELECT * FROM spesialis WHERE id = '$id'")->result();
    }

    public function getLokasi()
    {
        return $this->db->query("SELECT lokasi.* , kelurahan.nama FROM lokasi,kelurahan WHERE lokasi.id_kelurahan = kelurahan.id")->result();
    }

    public function getBerandaLokasi()
    {
        return $this->db->query("SELECT * FROM kelompok_tani")->result();
    }

    public function getBerita()
    {
        return $this->db->query("SELECT * FROM berita")->result();
    }

    public function getBeritaById($id)
    {
        return $this->db->query("SELECT * FROM berita WHERE id = '$id'")->result();
    }

    public function getKelompokTani()
    {
        return $this->db->query("SELECT kelompok_tani.*, kelurahan.nama AS namaKelurahan, kecamatan.nama AS namaKecamatan FROM kelompok_tani, kecamatan, kelurahan WHERE kelompok_tani.id_kelurahan =  kelurahan.id AND kecamatan.id = kelurahan.id_kecamatan")->result();
    }

    public function getKelompokTaniByName($name)
    {
        return $this->db->query("SELECT * FROM kelompok_tani WHERE kelompok_tani.nama = '$name'")->row();
    }

    public function getKecamatan()
    {
        return $this->db->query("SELECT * FROM kecamatan")->result();
    }

    public function getKelurahan()
    {
        return $this->db->query("SELECT kelurahan.id AS idKelurahan, kecamatan.id AS idKecamatan,kelurahan.nama AS namaKelurahan, kecamatan.nama AS namaKecamatan FROM kelurahan,kecamatan WHERE kecamatan.id = kelurahan.id_kecamatan")->result();
    }

    public function getAllKelurahan()
    {
        return $this->db->query("SELECT * FROM kelurahan")->result();
    }

    public function getGaleriById($idKelompokTani)
    {
        return $this->db->query("SELECT * FROM galeri WHERE galeri.id_kelompok = '$idKelompokTani'")->result();
    }

    public function getAnggotaByIdKelompok($id)
    {
        return $this->db->query("SELECT * FROM anggota WHERE anggota.id_kelompok = '$id'")->result();
    }

    public function getAnggotaById($id)
    {
        return $this->db->query("SELECT * FROM anggota WHERE anggota.id = '$id'")->result();
    }

    public function getAnggotaByIdRow($id)
    {
        return $this->db->query("SELECT * FROM anggota WHERE anggota.id = '$id'")->row();
    }
    public function getHasilByIdKelompok($id)
    {
        return $this->db->query("SELECT * FROM hasil_panen WHERE hasil_panen.id_kelompok = '$id'")->result();
    }

    public function getHasilById($id)
    {
        return $this->db->query("SELECT * FROM hasil_panen WHERE hasil_panen.id = '$id'")->result();
    }

    public function getHasilByIdRow($id)
    {
        return $this->db->query("SELECT * FROM hasil_panen WHERE hasil_panen.id = '$id'")->row();
    }

    public function getSaran()
    {
        return $this->db->query("SELECT * FROM saran")->result();
    }

    public function insertKelompokTani($data)
    {
        $this->db->insert('kelompok_tani', $data);
    }

    public function insertBerita($data)
    {
        $this->db->insert('berita', $data);
    }

    public function insertAnggota($data)
    {
        $this->db->insert('anggota', $data);
    }

    public function insertHasil($data)
    {
        $this->db->insert('hasil_panen', $data);
    }

    public function insertKecamatan($data)
    {
        $this->db->insert('kecamatan', $data);
    }

    public function insertKelurahan($data)
    {
        $this->db->insert('kelurahan', $data);
    }

    public function insertGaleri($data)
    {
        $this->db->insert('galeri', $data);
    }

    public function updateKelompokTani($id, $data)
    {
        $this->db->update('kelompok_tani', $data, array('id' => $id));
    }

    public function updateAnggota($id, $data)
    {
        $this->db->update('anggota', $data, array('id' => $id));
    }
    public function updateHasil($id, $data)
    {
        $this->db->update('hasil_panen', $data, array('id' => $id));
    }

    public function updateBerita($id, $data)
    {
        $this->db->update('berita', $data, array('id' => $id));
    }

    public function updateKecamatan($id, $data)
    {
        $this->db->update('kecamatan', $data, array('id' => $id));
    }

    public function updateKelurahan($id, $data)
    {
        $this->db->update('kelurahan', $data, array('id' => $id));
    }

    public function deleteBerita($id)
    {
        $this->db->delete('berita', array('id' => $id));
    }

    public function deleteKecamatan($id)
    {
        $this->db->delete('kecamatan', array('id' => $id));
    }

    public function deleteKelurahan($id)
    {
        $this->db->delete('kelurahan', array('id' => $id));
    }

    public function deleteGaleri($id)
    {
        $this->db->delete('galeri', array('id' => $id));
    }

    public function deleteKelompokTani($id)
    {
        $this->db->delete('kelompok_tani', array('id' => $id));
    }

    public function deleteAnggota($id)
    {
        $this->db->delete('anggota', array('id' => $id));
    }
    public function deleteHasil($id)
    {
        $this->db->delete('hasil_panen', array('id' => $id));
    }

    public function deleteSaran($id)
    {
        $this->db->delete('saran', array('id' => $id));
    }
}
