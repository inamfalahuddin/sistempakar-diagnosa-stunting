<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Gejala_model');
        $this->load->model('Penyakit_model');

        // middleware login
        $this->load->helper('auth_helper');
        check_login();
    }

    public function index()
    {
        $penyakit = $this->db->get('tbl_penyakit')->num_rows();
        $gejala = $this->db->get('tbl_gejala')->num_rows();
        $diagnosa = 0;

        $data['data_counter'] = [
            [
                'title' => 'Data Penyakit',
                'count' => $penyakit,
            ],
            [
                'title' => 'Data Gejala',
                'count' => $gejala,
            ],
            [
                'title' => 'Data Diagnosa',
                'count' => $diagnosa,
            ],
            [
                'title' => 'Jumlah Balita yang Diperiksa',
                'count' => '0'
            ],
            [
                'title' => 'Jumlah Balita yang Terdiagnosa Stunting',
                'count' => '0'
            ],
            [
                'title' => 'Jumlah Balita yang Terdiagnosa Normal',
                'count' => '0'
            ],
        ];

        $data['content'] = $this->load->view('dashboard_view', $data, TRUE); // Load view content
        $this->load->view('templates/main_template', $data);
    }
}
