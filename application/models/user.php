<?php

class user extends CI_Model
{

   public function getLokasi()
   {
      // notes: dataColumns = nama sayur buah dll
      $result = [];
      $lokasi = $this->db->query("SELECT desa.*, kecamatan.nama AS namaKecamatan FROM desa INNER JOIN kecamatan ON kecamatan.id = desa.id_kecamatan")->result();

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
            'idDesa' => $lokasi->id,
            'namaDesa' => $lokasi->nama,
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
      return $this->db->query("SELECT desa.id AS idDesa, jenis_tanaman.id AS idJenis ,jenis_tanaman.nama AS namaTanaman, SUM(hasil_panen.hasil) AS totalHasil, hasil_panen.tahun
      FROM desa
      INNER JOIN hasil_panen ON desa.id = hasil_panen.id_desa 
      INNER JOIN jenis_tanaman ON hasil_panen.id_jenis = jenis_tanaman.id
      WHERE desa.id = '$lokasiID' AND YEAR(hasil_panen.tahun) = YEAR(CURDATE())
      GROUP BY desa.id, hasil_panen.tahun, jenis_tanaman.id")->result();
   }

   private function dataTahun($lokasiID)
   {
      return $this->db->query("SELECT hasil_panen.tahun, hasil_panen.id_jenis
      FROM hasil_panen
      INNER JOIN desa ON desa.id = hasil_panen.id_desa
      WHERE desa.id = '$lokasiID' AND YEAR(hasil_panen.tahun) = YEAR(CURDATE())
      GROUP BY hasil_panen.tahun")->result();
   }

   public function getHasilByIdDesa($id)
   {
      return $this->db->query("SELECT hasil_panen.*, kelompok_tani.nama AS namaKelompok FROM hasil_panen
      INNER JOIN kelompok_tani ON kelompok_tani.id = hasil_panen.id_kelompok
      INNER JOIN desa ON desa.id = kelompok_tani.id_desa
      WHERE desa.id = '$id' ORDER BY hasil_panen.tahun DESC")->result();
   }



   public function getJenisTanaman()
   {
      return $this->db->query("SELECT * FROM jenis_tanaman")->result();
   }
   //


   public function getHasilSumPerDesa($idKecamatan = 0)
   {
      $data = [];
      if ($idKecamatan == 0) {
         $desa = $this->db->query("SELECT * FROM desa")->result();
      } else {
         $desa = $this->db->query("SELECT * FROM desa WHERE id_kecamatan = '$idKecamatan'")->result();
      }
      $jenisTanaman = $this->db->query("SELECT * FROM jenis_tanaman")->result();
      foreach ($desa as $k) {
         $tempData = [];
         array_push($tempData, $k->nama);

         foreach ($jenisTanaman as $jt) {
            $resultSum = 0;
            foreach ($this->hasilByIdDesa($k->id) as $hasil) {
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

   private function hasilByIdDesa($id)
   {
      return $this->db->query("SELECT * FROM hasil_panen WHERE hasil_panen.id_desa = '$id'")->result();
   }

   public function getDesaByKecamatan($id)
   {
      return;
   }



   public function getHasil()
   {
      return $this->db->query("SELECT hasil_panen.*, jenis_tanaman.nama AS namaJenis, desa.id AS idDesa
      FROM hasil_panen
      INNER JOIN desa ON desa.id = hasil_panen.id_desa
      INNER JOIN jenis_tanaman ON jenis_tanaman.id = hasil_panen.id_jenis
      ORDER BY hasil_panen.tahun DESC")->result();
   }

   public function getAbout()
   {
      return $this->db->query("SELECT * FROM about")->row();
   }

   public function getDesa($idKecamatan = null)
   {
      if ($idKecamatan == null) {
         return $this->db->query("SELECT desa.*, kecamatan.nama AS namaKecamatan FROM desa JOIN kecamatan ON kecamatan.id = desa.id_kecamatan")->result();
      } else {
         return $this->db->query("SELECT desa.*, kecamatan.nama AS namaKecamatan FROM desa JOIN kecamatan ON kecamatan.id = desa.id_kecamatan WHERE desa.id_kecamatan = '$idKecamatan'")->result();
      }
   }

   public function getKecamatan()
   {
      return $this->db->query("SELECT * FROM kecamatan")->result();
   }

   public function getDesaById($id)
   {
      return $this->db->query("SELECT desa.*, kecamatan.nama AS namaKecamatan FROM desa,kecamatan WHERE kecamatan.id = desa.id_kecamatan AND desa.id = '$id'")->row();
   }

   public function insert($data)
   {
      $this->db->insert('saran', $data);
   }
}
