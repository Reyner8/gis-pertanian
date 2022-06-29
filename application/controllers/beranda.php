<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beranda extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
   }

   public function index()
   {

      $data = array(
         'title' => 'Home',
      );
      $this->load->view('user/beranda', $data);
   }
}
