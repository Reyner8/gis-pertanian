<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hasil_pertanian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
    }

    public function index()
    {
        $data = [
            'title' => 'Hasil Pertanian',
            'hasilSum' => $this->user->getHasilSumPerDesa(),
            'hasil' => $this->user->getHasil(),
            'desa' => $this->user->getDesa(),
            'jenisTanaman' => $this->user->getJenisTanaman(),
            'kecamatan' => $this->user->getKecamatan(),
            'isSearch' => false,
        ];

        $this->load->view('user/hasil_panen', $data);
    }

    public function cari()
    {
        $idKecamatan = $this->input->post('idKecamatan');

        $data = [
            'title' => 'Hasil Pertanian',
            'hasilSum' => $this->user->getHasilSumPerDesa($idKecamatan),
            'hasil' => $this->user->getHasil(),
            'desa' => $this->user->getDesa($idKecamatan),
            'jenisTanaman' => $this->user->getJenisTanaman(),
            'kecamatan' => $this->user->getKecamatan(),
            'isSearch' => true,
        ];



        $this->load->view('user/hasil_panen', $data);
    }
}
