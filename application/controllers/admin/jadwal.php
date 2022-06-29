<?php
defined('BASEPATH') or exit('No direct script access allowed');


class jadwal extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('admin');
      $this->load->library('form_validation');
      if (!$this->session->userdata('logData')) {
         redirect('admin/log');
      }
   }

   public function index()
   {
      $data = array(
         'title' => 'Jadwal',
         'name' => $this->session->userdata('username'),
         'dataDokter' => $this->admin->getDokter(),
         'dataJadwal' => $this->admin->getJadwal(),
      );
      $this->load->view('admin/jadwal', $data);
   }

   public function lokasiPraktikJSON()
   {
      $data = $this->admin->getLokasiAndPraktik();
      echo json_encode($data);
   }

   public function addJadwal()
   {
      $this->form_validation->set_rules('dokter', 'Dokter', 'callback_dropdownCheck');
      $this->form_validation->set_rules('lokasi', 'Lokasi', 'callback_dropdownCheck');
      $this->form_validation->set_rules('hari', 'Hari', 'callback_dropdownCheck');
      $this->form_validation->set_rules('jamBuka', 'JamBuka', 'required');
      $this->form_validation->set_rules('jamTutup', 'JamTutup', 'required');
      if ($this->form_validation->run()) {

         $idDokter = $this->input->post('dokter');
         $idLokasi = $this->input->post('lokasi');
         $hari = $this->input->post('hari');
         $jamBuka = $this->input->post('jamBuka') . ':00';
         $jamTutup = $this->input->post('jamTutup') . ':00';

         $praktik = $this->admin->getPraktikById($idDokter, $idLokasi);
         if ($praktik[0]->hari == null) {
            $update = array(
               'hari' => $hari,
               'jam_buka' => $jamBuka,
               'jam_tutup' => $jamTutup
            );
            $this->admin->insertJadwal($praktik[0]->id, $update);
         } else {
            $data = array(
               'id_dokter' => $idDokter,
               'id_lokasi' => $idLokasi,
               'hari' => $hari,
               'jam_buka' => $jamBuka,
               'jam_tutup' => $jamTutup
            );
            $this->admin->insertJadwal('', $data);
         }
         redirect('admin/jadwal');
      } else {
         $this->index();
      }
   }

   public function dropdownCheck($str)
   {
      if ($str == '') {
         $this->form_validation->set_message('dropdownCheck', 'Please Select Your {field}');
         return FALSE;
      } else {
         return TRUE;
      }
   }

   public function deleteJadwal($id)
   {
      $this->admin->deleteJadwal($id);
      redirect('admin/jadwal');
   }
}
