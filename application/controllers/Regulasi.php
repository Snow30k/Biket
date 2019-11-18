<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regulasi extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('admininfo_model');
      $this->load->helper('text');
      $this->load->library('form_validation');
      $this->load->model('regulasi_model');
      $this->load->helper('download');
   }
   public function index()
   {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['infos'] = $this->admininfo_model->getinfolimit(5);
      $data['regulasi'] = $this->regulasi_model->get();
      $this->load->view('templates/main_header');
      $this->load->view('regulasi/indexnasional', $data);
      $this->load->view('templates/main_footer');
   }

   public function indexprovinsi()
   {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['infos'] = $this->admininfo_model->getinfolimit(5);
      $data['regulasi'] = $this->regulasi_model->getByTipe('Provinsi');
      $this->load->view('templates/main_header');
      $this->load->view('regulasi/indexprovinsi', $data);
      $this->load->view('templates/main_footer');
   }

   public function admin()
   {
      is_logged_in();
      $data['title'] = 'Management Regulasi';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['regulasi'] = $this->regulasi_model->get();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('regulasi/admin', $data);
      $this->load->view('templates/footer');
   }

   public function _cleanStr($string)
   {
      // Replaces all spaces with hyphens.
      $string = str_replace(' ', '-', $string);
      // Removes special chars.
      $string = preg_replace('/[^A-Za-z0-9\.-]/', '', $string);
      // Replaces multiple hyphens with single one.
      $string = preg_replace('/-+/', '-', $string);
      return $string;
   }


   public function add()
   {
      is_logged_in();
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->library('upload');
      $this->form_validation->set_rules('judul', 'Judul', 'required');
      $this->form_validation->set_rules('tipe', 'Tipe', 'required');
      if (isset($_FILES['input-regulasi'])) {
         $name =  $_FILES['input-regulasi']['name'];
         $name = $this->_cleanStr($name);
      } else {
         $name = '';
      }
      // $upload_data = $this->_cleanStr($upload_data);
      $config['upload_path'] = './assets/uploads';
      $config['allowed_types'] = 'pdf|csv|doc|docx|xlsx|txt|odt';
      $config['max_size'] = 1024;
      $config['file_name'] = $name;
      $this->upload->initialize($config);

      if ($this->form_validation->run() == FALSE || !$this->upload->do_upload('input-regulasi')) {
         $data['title'] = 'Add Regulasi';
         $data['error'] = $this->upload->display_errors();
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('regulasi/add', $data);
         $this->load->view('templates/footer');
      } else {
         $frmData = [
            'judul' => $this->input->post('judul'),
            'tipe' => $this->input->post('tipe'),
            'link' => $name,
            'user_id' => $data['user']['id']
         ];
         if ($this->regulasi_model->insert($frmData)) {
            $this->session->set_flashdata('message', 'data berhasil ditambah');
            $this->session->set_flashdata('type', 'success');
         } else {
            $this->session->set_flashdata('message', 'terjadi kesalahan pada saat menambahkan data');
            $this->session->set_flashdata('type', 'error');
         }

         redirect('info/admin/regulasi');
      }
   }

   public function update($id)
   {
      is_logged_in();
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->library('upload');
      $this->form_validation->set_rules('judul', 'Judul', 'required');
      $this->form_validation->set_rules('tipe', 'Tipe', 'required');
      if (isset($_FILES['input-regulasi'])) {
         $name =  $_FILES['input-regulasi']['name'];
         $name = $this->_cleanStr($name);
      } else {
         $name = '';
      }
      $config['upload_path'] = './assets/uploads';
      $config['allowed_types'] = 'pdf|csv|doc|docx|xlsx|txt|odt';
      $config['max_size'] = 1024;
      $config['file_name'] = $name;
      $this->load->library('upload', $config);

      $data['regulasi'] = $this->regulasi_model->getById($id);
      if ($this->form_validation->run() == FALSE) {
         $data['title'] = 'Add Regulasi';
         $data['error'] = $this->upload->display_errors();
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('regulasi/edit', $data);
         $this->load->view('templates/footer');
      } else {
         if (!$this->upload->do_upload('input-regulasi')) {
            $frmData = [
               'judul' => $this->input->post('judul'),
               'tipe' => $this->input->post('tipe'),
               'link' => $data['regulasi']['link'],
               'user_id' => $data['user']['id']
            ];
         } else {
            unlink('./assets/uploads/' . $data['regulasi']['link']);
            $frmData = [
               'judul' => $this->input->post('judul'),
               'tipe' => $this->input->post('tipe'),
               'link' => $name,
               'user_id' => $data['user']['id']
            ];
         }

         if ($this->regulasi_model->update($frmData, $id)) {
            $this->session->set_flashdata('message', 'data berhasil ditambah');
            $this->session->set_flashdata('type', 'success');
         } else {
            $this->session->set_flashdata('message', 'terjadi kesalahan pada saat menambahkan data');
            $this->session->set_flashdata('type', 'error');
         }

         redirect('info/admin/regulasi');
      }
   }

   public function delete($id)
   {
      $data['regulasi'] = $this->regulasi_model->getById($id);
      unlink('./assets/uploads/' . $data['regulasi']['link']);
      if ($this->regulasi_model->delete($id)) {
         $this->session->set_flashdata('message', 'data berhasil ditambah');
         $this->session->set_flashdata('type', 'success');
      } else {
         $this->session->set_flashdata('message', 'terjadi kesalahan pada saat menambahkan data');
         $this->session->set_flashdata('type', 'error');
      }
      redirect('info/admin/regulasi');
   }

   public function download($name)
   {
      force_download('./assets/uploads/' . $name, NULL);
   }
}
