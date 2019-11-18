<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page_model extends CI_Model
{ 
   public function insertCoursel($data)
   {
      $this->db->insert('coursel', $data);
      return ($this->db->affected_rows() != 1) ? false : true;
   }

   public function updateCoursel($data, $id)
   {
      $this->db->where('id', $id);
      $this->db->update('coursel', $data);
      return ($this->db->affected_rows() != 1) ? false : true;
   }

   public function deleteCoursel($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('coursel');
      return ($this->db->affected_rows() != 1) ? false : true;
   }

   public function getCoursel()
   {
      return $this->db->get('coursel')->result_array();
   }
}
