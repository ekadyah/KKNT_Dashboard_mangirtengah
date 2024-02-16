<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserArea extends CI_Controller
{
    public function index()
    {
        // Tampilkan halaman utama tampilan pengguna
        $this->load->view('user_area/home');
    }

    // Tambahkan fungsi lainnya sesuai kebutuhan
}