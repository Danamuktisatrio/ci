<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');
class Kecamatan_model extends CI_Model {
        function getdatakec(){
        $query = $this->db->query("SELECT * FROM kecamatan ORDER BY Nama_Kec ASC");
                return $query->result();
                
            }
            function get_desa($id){
                $this->db->form("desa");
                $this->db->where("id_kec", $id);
                $query = $this->db->get();
                return $query->result();
                        
                }
        //     //searcing
        // public function get_keyword($keyword){
        //     $this->db->select('*');
        //     $this->db->form('kecamatan');
        //     $this->db->like('Nama_Kec', $keyword);
        //     return $this->db->get()->result();

    //}
}