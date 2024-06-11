<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rules extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Gejala_model');

        // middleware login
        $this->load->helper('auth_helper');
        check_login();
    }

    public function index()
    {

        $data_gejala = $this->Gejala_model->get_all_gejala();
        $data['data_gejala'] = $data_gejala;
        $data['title'] = 'Data Basis Aturan'; // Set title
        $data['content'] = $this->load->view('knowledge/basis_aturan_view', $data, TRUE); // Load view content
        $this->load->view('templates/main_template', $data);
    }
}
