<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
      public function __construct()
      {
            parent::__construct();
            $this->load->model('admininfo_model');
            $this->load->helper('text');
            $this->load->model('page_model');
      }
      public function index()
      {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['info'] = $this->admininfo_model->getinfolimit(3);
            $data['faq'] = $this->admininfo_model->getfaq();
            $data['coursels'] = $this->page_model->getCoursel();
            $this->load->view('templates/main_header');
            $this->load->view('landing', $data);
            $this->load->view('templates/main_footer');
      }
}

