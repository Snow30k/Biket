<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admininfo_model extends CI_Model
{
   public function getinfo()
   {
      $this->db->select('info.id as id, info.subjudul as subjudul, info.judul as judul, info.body as body, user.name as user_name, info.tgl as tgl');
      $this->db->from('info');
      $this->db->join('user', 'user.id = info.user_id', 'inner');
      $this->db->order_by('tgl', 'DESC');
      return $this->db->get()->result_array();
   }

   public function getinfobyid($id)
   {
      $this->db->select('info.id as id, info.subjudul as subjudul, info.judul as judul, info.body as body, user.name as user_name, info.tgl as tgl');
      $this->db->from('info');
      $this->db->join('user', 'user.id = info.user_id', 'inner');
      $this->db->where('info.id', $id);
      return $this->db->get()->row_array();
   }

   public function insertInfo($data)
   {
      $this->db->insert('info', $data);
      return ($this->db->affected_rows() != 1) ? false : true;
   }

   public function updateinfo($data, $id)
   {
      $this->db->where('id', $id);
      $this->db->update('info', $data);
      return ($this->db->affected_rows() != 1) ? false : true;
   }

   public function deleteinfo($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('info');
      return ($this->db->affected_rows() != 1) ? false : true;
   }

   public function getinfolimit($limit)
   {
      $this->db->limit($limit);
      $this->db->order_by('tgl', 'DESC');
      return $this->db->get('info')->result_array();
   }

   public function insertfaq($data)
   {
      $this->db->insert('faq', $data);
      return ($this->db->affected_rows() != 1) ? false : true;
   }

   public function updatefaq($data, $id)
   {
      $this->db->where('id', $id);
      $this->db->update('faq', $data);
      return ($this->db->affected_rows() != 1) ? false : true;
   }

   public function getfaq()
   {
      return $this->db->get('faq')->result_array();
   }

   public function getfaqbyid($id)
   {
      $this->db->where('id', $id);
      return $this->db->get('faq')->row_array();
   }

   public function deletefaq($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('faq');
      return ($this->db->affected_rows() != 1) ? false : true;
   }

}
