<?php defined('BASEPATH') or exit ('No direct script access allowed'); 
class Kecamatan_model extends CI_Model {
        function getdatakec(){
            $query = $this->db->query("SELECT * FROM kecamatan ORDER BY Nama_Kec ASC");
            return $query->result();
                
        }
        function getDataDesa($idkecamatan){
                 return $this->db->get_where('desa',['id_kec'=>$idkecamatan])->result();
                        
        }
        public function tampil_data(){
            return $this->db->get('ddadd');
        }
        public function hapus_data ($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }
        public function edit_data($where, $table)
        {
            return $this->db->get_where($table, $where);
        }
        public function update_data($where,$data,$table)
        {
            $this->db->where($where);
            $this->db->update($table,$data);
        }
        // public function getDataWilayah(){
        //     $this->db->fsdlkfuiyio;
        // }

}