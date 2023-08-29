<?php defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    
    public function get($table){
        $query = $this->db->get($table);
        return $query->result();
    }
    
    public function getAll($table, $where = null, $limit = null, $order = 'desc')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        if ($limit) {
            $this->db->order_by('id', $order);
            $this->db->limit($limit, 0);
        }
        $query = $this->db->get($table);
        return $query->result();
    }
    
    
    public function getOne($table, $where)
    {
        $query = $this->db->get_where($table, $where);
        return $query->row();
    }
    
    public function update($table, $where, $data)
    {
        return $this->db->update($table, $data, $where);
    }
}
?>