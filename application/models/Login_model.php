<?php defined('BASEPATH') or exit ('No direct script access allowed'); 
class Login_model extends CI_Model {

    public function masuk($where)
    {
        $this->db->get_where('user',$where);
    }

}