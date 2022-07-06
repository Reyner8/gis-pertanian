<?php

class admin extends CI_Model
{
    public function getAdmin($email)
    {
        return $this->db->query("SELECT * FROM admin WHERE email = '$email'")->result();
    }

    public function getDokter()
    {
        return $this->db->query("SELECT spesialis.nama AS namaSpesialis, dokter.nama AS namaDokter, dokter.id AS idDokter,bpjs,dokter.foto,spesialis.id FROM dokter,spesialis WHERE dokter.id_spesialis = spesialis.id")->result();
    }

    public function getDokter_id($id)
    {
        return $this->db->query("SELECT spesialis.nama AS namaSpesialis, dokter.nama AS namaDokter, dokter.id AS idDokter, dokter.id_spesialis,telepon,bpjs,dokter.foto,spesialis.id FROM dokter,spesialis WHERE dokter.id_spesialis = spesialis.id AND dokter.id = '$id'")->row();
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

    public function getSaran()
    {
        return $this->db->query("SELECT * FROM saran")->result();
    }

    public function insertJadwal($id, $data)
    {
        if ($id == '') {
            $this->db->insert('praktik', $data);
        } else {
            $this->db->update('praktik', $data, array('id' => $id));
        }
    }

    public function insertKelompokTani($data)
    {
        $this->db->insert('kelompok_tani', $data);
    }

    public function insertBerita($data)
    {
        $this->db->insert('berita', $data);
    }

    public function insertDokter($data)
    {
        $this->db->insert('kelompok_tani', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function insertDokterLoc($data)
    {
        $this->db->insert('praktik', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function insertLokasi($data)
    {
        $this->db->insert('lokasi', $data);
        return $this->db->insert_id();
    }

    public function insertSpesialis($data)
    {
        $this->db->insert('spesialis', $data);
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

    public function insertPraktik($data)
    {
        $this->db->insert('praktik', $data);
    }

    public function updateDokter($id, $data)
    {
        $this->db->update('dokter', $data, array('id' => $id));
    }

    public function updateSpesialis($id, $data)
    {
        $this->db->update('spesialis', $data, array('id' => $id));
    }

    public function updateBerita($id, $data)
    {
        $this->db->update('berita', $data, array('id' => $id));
    }

    public function updateLokasi($id, $data)
    {
        $this->db->update('lokasi', $data, array('id' => $id));
    }

    public function updateKecamatan($id, $data)
    {
        $this->db->update('kecamatan', $data, array('id' => $id));
    }

    public function updateKelurahan($id, $data)
    {
        $this->db->update('kelurahan', $data, array('id' => $id));
    }

    public function deleteSpesialis($id)
    {
        $this->db->delete('spesialis', array('id' => $id));
    }

    public function deleteDokter($id)
    {
        $this->db->delete('dokter', array('id' => $id));
        $this->db->delete('praktik', array('id_dokter' => $id));
    }

    public function deleteBerita($id)
    {
        $this->db->delete('berita', array('id' => $id));
    }

    public function deleteLokasi($id)
    {
        $this->db->delete('lokasi', array('id' => $id));
    }

    public function deleteLokasiPraktik($idLokasi, $idDokter)
    {
        $this->db->query("DELETE FROM praktik WHERE id_dokter = '$idDokter' AND id_lokasi = '$idLokasi'");
    }

    public function deleteJadwal($id)
    {
        // get id dokter & lokasi
        $getIds =  $this->db->query("SELECT * FROM praktik WHERE id = '$id'")->result()[0];
        $idDokter = $getIds->id_dokter;
        $idLokasi = $getIds->id_lokasi;

        // check
        $getData = $this->db->query("SELECT * FROM praktik WHERE id_dokter = '$idDokter' AND id_lokasi = '$idLokasi'")->result();
        if (count($getData) > 1) {
            $this->db->delete('praktik', array('id' => $id));
        } else {
            $data = array(
                'hari' => null,
                'jam_buka' => null,
                'jam_tutup' => null
            );
            $this->db->update('praktik', $data, array('id' => $id));
        }
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

    public function deleteSaran($id)
    {
        $this->db->delete('saran', array('id' => $id));
    }
}
