<?php

class user extends CI_Model
{

   public function getLokasi()
   {
      // notes: dataColumns = nama sayur buah dll
      $result = [];
      $lokasi = $this->db->query("SELECT kelurahan.*, kecamatan.nama AS namaKecamatan FROM kelurahan INNER JOIN kecamatan ON kecamatan.id = kelurahan.id_kecamatan")->result();

      foreach ($lokasi as $lokasi) {
         $FinalDataRows = [];
         $dataRows = $this->dataRows($lokasi->id);
         $dataTahun = $this->dataTahun($lokasi->id);

         $dataColumns = [];
         foreach ($dataRows as $row) {
            array_push($dataColumns, $row->namaTanaman);
         }

         $arr = [];

         foreach ($dataTahun as $tahun) {
            array_push($arr, $tahun->tahun);
            foreach ($dataRows as $row) {
               if ($tahun->tahun == $row->tahun) {
                  array_push($arr, (int)$row->totalHasil);
               }
            }
            array_push($FinalDataRows, $arr);
            $arr = [];
         }


         // buat key array berurutan
         $dataColumnIterable = [];
         foreach (array_unique($dataColumns) as $val) {
            array_push($dataColumnIterable, $val);
         }

         array_push($result, [
            'idKelurahan' => $lokasi->id,
            'namaKelurahan' => $lokasi->nama,
            'lat' => $lokasi->lat,
            'lng' => $lokasi->lng,
            'icon' => $lokasi->icon,
            'namaKecamatan' => $lokasi->namaKecamatan,
            'dataColumns' => $dataColumnIterable,
            'dataRows' => $FinalDataRows,
            'data' => $dataRows,
            'tahun' => $dataTahun

         ]);
      }

      return $result;
   }

   private function dataRows($lokasiID)
   {
      return $this->db->query("SELECT kelurahan.id AS idKelurahan, jenis_tanaman.id AS idJenis ,jenis_tanaman.nama AS namaTanaman, SUM(hasil_panen.hasil) AS totalHasil, hasil_panen.tahun
      FROM kelurahan
      INNER JOIN hasil_panen ON kelurahan.id = hasil_panen.id_kelurahan 
      INNER JOIN jenis_tanaman ON hasil_panen.id_jenis = jenis_tanaman.id
      WHERE kelurahan.id = '$lokasiID' AND YEAR(hasil_panen.tahun) = YEAR(CURDATE())
      GROUP BY kelurahan.id, hasil_panen.tahun, jenis_tanaman.id")->result();
   }

   private function dataTahun($lokasiID)
   {
      return $this->db->query("SELECT hasil_panen.tahun, hasil_panen.id_jenis
      FROM hasil_panen
      INNER JOIN kelurahan ON kelurahan.id = hasil_panen.id_kelurahan
      WHERE kelurahan.id = '$lokasiID' AND YEAR(hasil_panen.tahun) = YEAR(CURDATE())
      GROUP BY hasil_panen.tahun")->result();
   }

   public function getHasilByIdKelurahan($id)
   {
      return $this->db->query("SELECT hasil_panen.*, kelompok_tani.nama AS namaKelompok FROM hasil_panen
      INNER JOIN kelompok_tani ON kelompok_tani.id = hasil_panen.id_kelompok
      INNER JOIN kelurahan ON kelurahan.id = kelompok_tani.id_kelurahan
      WHERE kelurahan.id = '$id' ORDER BY hasil_panen.tahun DESC")->result();
   }



   public function getJenisTanaman()
   {
      return $this->db->query("SELECT * FROM jenis_tanaman")->result();
   }
   //


   public function getHasilSumPerKelurahan($idKecamatan = 0)
   {
      $data = [];
      if ($idKecamatan == 0) {
         $kelurahan = $this->db->query("SELECT * FROM kelurahan")->result();
      } else {
         $kelurahan = $this->db->query("SELECT * FROM kelurahan WHERE id_kecamatan = '$idKecamatan'")->result();
      }
      $jenisTanaman = $this->db->query("SELECT * FROM jenis_tanaman")->result();
      foreach ($kelurahan as $k) {
         $tempData = [];
         array_push($tempData, $k->nama);

         foreach ($jenisTanaman as $jt) {
            $resultSum = 0;
            foreach ($this->hasilByIdKelurahan($k->id) as $hasil) {
               if ($jt->id == $hasil->id_jenis) {
                  $resultSum += $hasil->hasil;
               }
            }
            array_push($tempData, $resultSum);
         }
         array_push($data, $tempData);
      }
      return $data;
   }

   private function hasilByIdKelurahan($id)
   {
      return $this->db->query("SELECT * FROM hasil_panen WHERE hasil_panen.id_kelurahan = '$id'")->result();
   }

   public function getKelurahanByKecamatan($id)
   {
      return;
   }



   public function getHasil()
   {
      return $this->db->query("SELECT hasil_panen.*, jenis_tanaman.nama AS namaJenis, kelurahan.id AS idKelurahan
      FROM hasil_panen
      INNER JOIN kelurahan ON kelurahan.id = hasil_panen.id_kelurahan
      INNER JOIN jenis_tanaman ON jenis_tanaman.id = hasil_panen.id_jenis
      ORDER BY hasil_panen.tahun DESC")->result();
   }

   public function getAbout()
   {
      return $this->db->query("SELECT * FROM about")->row();
   }

   public function getKelurahan($idKecamatan = null)
   {
      if ($idKecamatan == null) {
         return $this->db->query("SELECT kelurahan.*, kecamatan.nama AS namaKecamatan FROM kelurahan JOIN kecamatan ON kecamatan.id = kelurahan.id_kecamatan")->result();
      } else {
         return $this->db->query("SELECT kelurahan.*, kecamatan.nama AS namaKecamatan FROM kelurahan JOIN kecamatan ON kecamatan.id = kelurahan.id_kecamatan WHERE kelurahan.id_kecamatan = '$idKecamatan'")->result();
      }
   }

   public function getKecamatan()
   {
      return $this->db->query("SELECT * FROM kecamatan")->result();
   }

   public function getKelurahanById($id)
   {
      return $this->db->query("SELECT kelurahan.*, kecamatan.nama AS namaKecamatan FROM kelurahan,kecamatan WHERE kecamatan.id = kelurahan.id_kecamatan AND kelurahan.id = '$id'")->row();
   }

   public function insert($data)
   {
      $this->db->insert('saran', $data);
   }
}
