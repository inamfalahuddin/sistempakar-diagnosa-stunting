<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antropometri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Diagnosa_model');

        // middleware login
        $this->load->helper('auth_helper');
        check_login();
    }

    public function index()
    {
        $data_lists = $this->Diagnosa_model->get_all_diagnosa();
        $data['data_lists'] = $data_lists;
        $data['title'] = 'Data Antropometri'; // Set title
        $data['content'] = $this->load->view('diagnosa/antropometri_view', $data, TRUE); // Load view content
        $this->load->view('templates/main_template', $data);
    }


    public function detail($id_user)
    {
        $this->load->model('Diagnosa_model');
        $this->load->model('Gejala_model');

        $data['data_user'] = $this->Diagnosa_model->get_diagnosa_by_kode($id_user);

        $CF_user = $this->Diagnosa_model->get_all_bobot_diagnosa_user($id_user);
        $CF_pakar = $this->Gejala_model->get_all_bobot_diagnosa_pakar();

        $CF = array();
        foreach ($CF_pakar as $key => $pakar) {
            $pakar_bobot = floatval($pakar['bobot_gejala']);
            $user_bobot = isset($CF_user[$key]['bobot']) ? floatval($CF_user[$key]['bobot']) : 0;

            $CF[] = $pakar_bobot * $user_bobot;
        }

        $CF_old = floatval($CF[0]);

        for ($i = 1; $i < count($CF); $i++) {
            $CF_old = $this->_calculate_CF($CF_old, floatval($CF[$i]));
        }

        $data['cf'] = $CF;
        $data['cf_pakar'] = $CF_pakar;
        $data['cf_user'] = $CF_user;

        $data['title'] = 'Data Perhitungan CF'; // Set title
        $data['content'] = $this->load->view('diagnosa/detail_view', $data, TRUE); // Load view content
        $this->load->view('templates/main_template', $data);
    }

    private function _calculate_CF($cf_old, $cf_new)
    {
        return $cf_old + ($cf_new * (1 - $cf_old));
    }

    private function _categorize($cf_value)
    {
        if ($cf_value >= 0.8) {
            return 'Stunting';
        } elseif ($cf_value < 0.8 && $cf_value >= 0.5) {
            return 'Berisiko Stunting';
        } else {
            return 'Normal';
        }
    }
}
