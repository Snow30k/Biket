<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admininfo extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->library('email');
      $this->load->library('form_validation');
      $this->load->model('admininfo_model');
   }

   public function index()
   {
      $data['title'] = 'Management Info';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['info'] = $this->admininfo_model->getinfo();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('info/admin', $data);
      $this->load->view('templates/footer');
   }

   public function create()
   {
      $data['title'] = 'Buat Info Baru';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('infobody', 'Infobdy', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('info/create', $data);
         $this->load->view('templates/footer');
      } else {
         $fomrData = [
            'judul' => $this->input->post('title'),
            'subjudul' => $this->input->post('subtitle'),
            'body' => $this->input->post('infobody'),
            'user_id' => $data['user']['id'],
            'tgl' => date('Y-m-d')
         ];

         if ($this->admininfo_model->insertInfo($fomrData)) {
            $this->session->set_flashdata('message', 'data berhasil ditambah');
            $this->session->set_flashdata('type', 'success');
         } else {
            $this->session->set_flashdata('message', 'terjadi kesalahan pada saat menambahkan data');
            $this->session->set_flashdata('type', 'error');
         }
         redirect('info/admin');
      }
   }

   public function update($id)
   {
      $data['title'] = 'Buat Info Baru';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['content'] = $this->admininfo_model->getinfobyid($id);
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('infobody', 'Infobdy', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('info/update', $data);
         $this->load->view('templates/footer');
      } else {
         $fomrData = [
            'judul' => $this->input->post('title'),
            'subjudul' => $this->input->post('subtitle'),
            'body' => $this->input->post('infobody'),
            'user_id' => $data['user']['id'],
            'tgl' => $data['content']['tgl'],
         ];

         if ($this->admininfo_model->updateinfo($fomrData, $id)) {
            $this->session->set_flashdata('message', 'data berhasil diubah');
            $this->session->set_flashdata('type', 'success');
         } else {
            $this->session->set_flashdata('message', 'terjadi kesalahan pada saat mengubah data');
            $this->session->set_flashdata('type', 'error');
         }
         redirect('info/admin');
      }
   }

   public function delete($id)
   {
      if ($this->admininfo_model->deleteinfo($id)) {
         $this->session->set_flashdata('message', 'data berhasil Dihapus');
         $this->session->set_flashdata('type', 'success');
      } else {
         $this->session->set_flashdata('message', 'terjadi kesalahan pada saat menghapus data');
         $this->session->set_flashdata('type', 'error');
      }
      redirect('info/admin');
   }

   public function faq()
   {
      $data['title'] = 'Management FAQ';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['faq'] = $this->admininfo_model->getfaq();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('faq/admin', $data);
      $this->load->view('templates/footer');
   }

   public function getfaqbyid($id)
   {
      $id = $this->security->xss_clean($id);
      echo json_encode($this->admininfo_model->getfaqbyid($id));
   }

   public function addfaq()
   {
      $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
      $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');

      $data['title'] = 'Management FAQ';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['faq'] = $this->admininfo_model->getfaq();

      if ($this->form_validation->run() == FALSE) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('faq/admin', $data);
         $this->load->view('templates/footer');
      } else {
         $fomrData = [
            'pertanyaan' => $this->input->post('pertanyaan'),
            'jawaban' => $this->input->post('jawaban')
         ];

         if ($this->admininfo_model->insertfaq($fomrData)) {
            $this->session->set_flashdata('message', 'data berhasil ditambah');
            $this->session->set_flashdata('type', 'success');
         } else {
            $this->session->set_flashdata('message', 'terjadi kesalahan pada saat menambahkan data');
            $this->session->set_flashdata('type', 'error');
         }
         redirect('info/admin/faq');
      }
   }

   public function updatefaq($id)
   {
      $this->form_validation->set_rules('update_pertanyaan', 'Pertanyaan', 'required');
      $this->form_validation->set_rules('update_jawaban', 'Jawaban', 'required');

      $data['title'] = 'Management FAQ';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['faq'] = $this->admininfo_model->getfaq();

      if ($this->form_validation->run() == FALSE) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('faq/admin', $data);
         $this->load->view('templates/footer');
      } else {
         $fomrData = [
            'pertanyaan' => $this->input->post('update_pertanyaan'),
            'jawaban' => $this->input->post('update_jawaban')
         ];

         if ($this->admininfo_model->updatefaq($fomrData, $id)) {
            $this->session->set_flashdata('message', 'data berhasil diubah');
            $this->session->set_flashdata('type', 'success');
         } else {
            $this->session->set_flashdata('message', 'terjadi kesalahan pada saat mengubah data');
            $this->session->set_flashdata('type', 'error');
         }
         redirect('info/admin/faq');
      }
   }

   public function deletefaq($id)
   {
      if ($this->admininfo_model->deletefaq($id)) {
         $this->session->set_flashdata('message', 'data berhasil Dihapus');
         $this->session->set_flashdata('type', 'success');
      } else {
         $this->session->set_flashdata('message', 'terjadi kesalahan pada saat menghapus data');
         $this->session->set_flashdata('type', 'error');
      }
      redirect('info/admin/faq');
   }
}
