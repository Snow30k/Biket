<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->library('email');
      $this->load->library('form_validation');
      $this->load->model('page_model');
   }

   public function coursel()
   {
      $data['title'] = 'Management Landing Coursel';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['coursels'] = $this->page_model->getCoursel();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('page/coursel', $data);
      $this->load->view('templates/footer');
   }

   public function addcoursel()
   {
      $this->form_validation->set_rules('link-add', 'Image', 'required');

      if ($this->form_validation->run() == FALSE) {
         $data['title'] = 'Management Landing Coursel';
         $data['coursels'] = $this->page_model->getCoursel();
         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('page/coursel', $data);
         $this->load->view('templates/footer');
      } else {
         $fomrData = [
            'link' => $this->input->post('link-add'),
            'judul' => $this->input->post('judul-add'),
            'deskripsi' => $this->input->post('deskripsi-add')
         ];

         if ($this->page_model->insertCoursel($fomrData)) {
            $this->session->set_flashdata('message', 'data berhasil ditambah');
            $this->session->set_flashdata('type', 'success');
         } else {
            $this->session->set_flashdata('message', 'terjadi kesalahan pada saat menambahkan data');
            $this->session->set_flashdata('type', 'error');
         }
         redirect('page/coursel');
      }
   }

   public function editcoursel($id)
   {
      $this->form_validation->set_rules('link', 'Image', 'required');
      if ($this->form_validation->run() == FALSE) {
         $this->session->set_flashdata('message', 'terjadi kesalahan pada saat menambahkan data. Gambar tidak boleh kosong!!!');
         $this->session->set_flashdata('type', 'error');
      } else {
         $fomrData = [
            'link' => $this->input->post('link'),
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi')
         ];

         if ($this->page_model->updateCoursel($fomrData, $id)) {
            $this->session->set_flashdata('message', 'data berhasil diubah');
            $this->session->set_flashdata('type', 'success');
         } else {
            $this->session->set_flashdata('message', 'terjadi kesalahan pada saat menambahkan data');
            $this->session->set_flashdata('type', 'error');
         }
      }
      redirect('page/coursel');
   }

   public function deleteCoursel($id)
   {
      if ($this->page_model->deleteCoursel($id)) {
         $this->session->set_flashdata('message', 'data berhasil Dihapus');
         $this->session->set_flashdata('type', 'success');
      } else {
         $this->session->set_flashdata('message', 'terjadi kesalahan pada saat menghapus data');
         $this->session->set_flashdata('type', 'error');
      }
      redirect('page/coursel');
   }
}
