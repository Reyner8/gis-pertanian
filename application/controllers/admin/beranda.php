<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin');

        if (!$this->session->userdata('logData')) {
            redirect('admin/log');
        }
    }

    public function index()
    {

        $data = array(
            'title' => 'Beranda',
            'name' => $this->session->userdata('username'),
            'dataTotalKelompokTani' => count($this->admin->getKelompokTani()),
            'dataTotalKelurahan' => count($this->admin->getKelurahan()),
        );
        $this->load->view('admin/beranda', $data);
    }

    public function lokasiJSON()
    {
        $data = $this->admin->getBerandaLokasi();
        echo json_encode($data);
    }
}
