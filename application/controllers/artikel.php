<?php
defined('BASEPATH') or exit('No direct script access allowed');

class artikel extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('user');
   }

   public function index()
   {
      $data = array(
         'title' => 'Artikel',
         'dataBerita' => $this->user->getBerita()
      );
      $this->load->view('user/artikel', $data);
   }

   public function detail($id)
   {
      $data = array(
         'title' => 'Artikel',
         'dataBerita' => $this->user->getBeritaById($id)
      );
      $this->load->view('user/detailArtikel', $data);
   }
}
