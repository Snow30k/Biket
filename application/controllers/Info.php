<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{
      public function __construct()
      {
            parent::__construct();
            $this->load->helper('text');
            $this->load->model('admininfo_model');
      }

      public function index()
      {
            $data['info'] = $this->admininfo_model->getinfo();
            $this->load->view('templates/main_header');
            $this->load->view('info/index', $data);
            $this->load->view('templates/main_footer');
      }

      public function show($info)
      {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['info'] = $this->admininfo_model->getinfobyid($info);
            $data['infos'] = $this->admininfo_model->getinfolimit(5);
            $this->load->view('templates/main_header');
            $this->load->view('info/info', $data);
            $this->load->view('templates/main_footer');
      }
}
