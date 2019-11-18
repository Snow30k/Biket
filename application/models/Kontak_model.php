<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak_model extends CI_Model
{
   public function __generateRandomString($length = 10)
   {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
         $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
   }
   
   public function insert()
   {
      $email = $this->input->post('email');
      $this->db->like('email', $email, 'none');
      $this->db->from('email');
      if ($this->db->count_all_results() < 1) {
         $data = ['email' => $email];
         $this->db->insert('email', $data);
      }
      $this->db->where('email', $email);
      $id = $this->db->get('email')->row_array();
      $email = $id['id'];
      $frmData = [
         'id' => $this->__generateRandomString() . date('YmdHis'),
         'email_id' => $email,
         'tgl' => date('Y-m-d H:m:s'),
         'pertayaan' => $this->input->post('pertanyaan'),
         'nama' => $this->input->post('nama')
      ];
      $this->db->insert('pesan', $frmData);
      return ($this->db->affected_rows() != 1) ? false : true;
   }

   public function get()
   {
      $this->db->select('pesan.id as id, pesan.nama as nama, email.email as email, pesan.tgl as tgl, pesan.pertayaan as pertanyaan');
      $this->db->from('pesan');
      $this->db->join('email', 'pesan.email_id = email.id', 'inner');
      return $this->db->get()->result_array();
   }

   public function getById($id)
   {
      $this->db->select('pesan.id as id, pesan.nama as nama, email.email as email, pesan.tgl as tgl, pesan.pertayaan as pertanyaan');
      $this->db->from('pesan');
      $this->db->join('email', 'pesan.email_id = email.id', 'inner');
      $this->db->where('pesan.id', $id);
      return $this->db->get()->row_array();
   }
}
