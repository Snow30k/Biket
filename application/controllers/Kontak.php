<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('admininfo_model');
      $this->load->library('email');
      $this->load->library('form_validation');
      $this->load->model('kontak_model');
   }

   public function index()
   {
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

      if ($this->form_validation->run() == FALSE) {
         $data['infos'] = $this->admininfo_model->getinfolimit(5);
         $data['faq'] = $this->admininfo_model->getfaq();
         $this->load->view('templates/main_header');
         $this->load->view('contac/index', $data);
         $this->load->view('templates/main_footer');
      } else {
         if ($this->kontak_model->insert()) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesan Berhasil Tersampaikan</div>');
         } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan pada saat engirim pesan</div>');
         }
         redirect('kontak');
      }
   }

   public function pesan()
   {
      is_logged_in();
      $data['title'] = 'Management Pesan Masuk';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['pesan'] = $this->kontak_model->get();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('contac/admin', $data);
      $this->load->view('templates/footer');
   }

   public function balas($id)
   {
      is_logged_in();
      $this->form_validation->set_rules('jawab', 'Jawabn Balasan', 'required');

      $data['pesan'] = $this->kontak_model->getById($id);
      if ($this->form_validation->run() == FALSE) {
         $data['title'] = 'Management Pesan Masuk';
         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('contac/balas', $data);
         $this->load->view('templates/footer');
      } else {
         if ($this->_sendEmail(
            $data['pesan']['email'],
            $this->input->post('jawab')
         )) {
            $this->db->where('id', $id);
            $this->db->delete('pesan');
            $this->session->set_flashdata('message', 'Pesan berhasil Dibalas');
            $this->session->set_flashdata('type', 'success');
         } else {
            $this->session->set_flashdata('message', 'terjadi kesalahan pada saat Membalas Pesan');
            $this->session->set_flashdata('type', 'error');
         }
         redirect('kontak/pesan');
      }
   }

   private function _sendEmail($email, $pesan)
   {
      
      $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.hostinger.co.id',
            'smtp_user' => 'me30k@myproject30k.tech',
            'smtp_pass' => 'E201arya$$',
            'smtp_port' => 587,
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('me30k@myproject30k.tech', 'myproject30k');
        $this->email->to($email);
      
      $this->email->subject('Jawaban Dari Pertanaan Anda');
      $this->email->message($pesan);

      if ($this->email->send()) {
         return true;
      } else {
          echo $email;
         echo $this->email->print_debugger();
         die;
      }
   }
}
