<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regulasi_model extends CI_Model
{
   public function get()
   {
      $this->db->select('regulasi.id as id, regulasi.judul as judul, regulasi.tipe, regulasi.link as link, user.name as user_name');
      $this->db->from('regulasi');
      $this->db->join('user', 'user.id = regulasi.user_id', 'inner');
      return $this->db->get()->result_array();
   }

   public function getByTipe($tipe)
   {
      $this->db->select('regulasi.id as id, regulasi.judul as judul, regulasi.tipe, regulasi.link as link, user.name as user_name');
      $this->db->from('regulasi');
      $this->db->join('user', 'user.id = regulasi.user_id', 'inner');
      $this->db->where('tipe', $tipe);
      return $this->db->get()->result_array();
   }


   public function getById($id)
   {
      $this->db->where('id', $id);
      return $this->db->get('regulasi')->row_array();
   }

   public function insert($data)
   {
      $this->db->insert('regulasi', $data);
      return ($this->db->affected_rows() != 1) ? false : true;
   }

   public function update($data, $id)
   {
      $this->db->where('id', $id);
      $this->db->update('regulasi', $data);
      return ($this->db->affected_rows() != 1) ? false : true;
   }

   public function delete($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('regulasi');
      return ($this->db->affected_rows() != 1) ? false : true;
   }
}
