<?php
defined('BASEPATH') or exit('No direct script access allowed');

class spesialis extends CI_Controller
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
         'title' => 'Spesialis',
         'name' => $this->session->userdata('username'),
         'dataSpesialis' => $this->admin->getSpesialis()
      );
      $this->load->view('admin/spesialis', $data);
   }

   public function addSpesialis()
   {
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('gambar', 'Dokter', 'callback_gambarCheck');


      if ($this->form_validation->run()) {
         $gambar = $_FILES['gambar']['name'];
         $this->admin->insertSpesialis(array(
            'nama' => ucwords($this->input->post('nama')),
            'icon' => $this->__uploadImage($gambar)
         ));

         redirect('admin/spesialis');
      } else {
         $this->session->set_flashdata('error', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');

         redirect('admin/spesialis');
      }
   }

   public function gambarCheck($str)
   {
      if ($_FILES['gambar']['name'] == '') {

         $this->form_validation->set_message('dropdownCheck', 'Please Select Your {field}');
         return FALSE;
      } else {
         return TRUE;
      }
   }

   public function updateForm($id)
   {
      $data = array(
         'title' => 'Spesialis',
         'name' => $this->session->userdata('username'),
         'formData' => $this->admin->getSpesialisById($id),
         'dataSpesialis' => $this->admin->getSpesialis()
      );
      $this->load->view('admin/updateSpesialis', $data);
   }

   public function updateSpesialis($id)
   {
      $oldImage = $this->admin->getSpesialisById($id);
      $gambar = $_FILES['gambar']['name'];
      $upload = $this->__uploadImage($gambar);


      if ($gambar == '') {
         $gambar = $oldImage[0]->icon;
      } else {
         // check file types
         // var_dump($upload == '');
         // die;
         if ($upload == '') {

            $this->session->set_flashdata('error', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert"> Update data gagal, Silahkan coba lagi !</div>');
         } else {
            unlink("./assets/images/icon/icon-marker/" . $oldImage);
            $gambar = $upload;
            $data = array(
               'nama' =>  ucwords($this->input->post('nama')),
               'icon' =>  $gambar
            );

            $this->admin->updateSpesialis($id, $data);
         }
      }
      redirect('admin/spesialis');
   }

   private function __uploadImage($gambar)
   {
      // image
      $name = $gambar;
      $allowedFileType = array('png', 'jpg');
      $explode = explode('.', $name);
      $randomName = rand();
      $newName = $randomName . '.' . $explode[1];
      $tmp_file = $_FILES['gambar']['tmp_name'];
      // -----
      if (in_array($explode[1], $allowedFileType) === true) {
         move_uploaded_file($tmp_file, './assets/images/icon/icon-marker/' . $newName);
         return $newName;
      }
   }

   public function deleteSpesialis($id)
   {
      $image = $this->admin->getSpesialisById($id)[0]->icon;
      unlink("./assets/images/icon/icon-marker/" . $image);
      $this->admin->deleteSpesialis($id);
      redirect('admin/spesialis');
   }
}
