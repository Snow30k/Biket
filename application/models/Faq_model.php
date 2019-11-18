<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq_model extends CI_Model
{
   public function insertfaq($data)
   {
      $this->db->insert('faq', $data);
      return ($this->db->affected_rows() != 1) ? false : true;
   }
   public function getfaq()
   {
      return $this->db->get('faq')->result_array();
      
   }
}
