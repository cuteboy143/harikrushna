<?php defined('BASEPATH') or exit('No direct script access allowed');

class General_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getOne($table, $where)
    {
        $query = $this->db->get_where($table, $where);
        return $query->row();
    }

     public function getOnebyorder($table, $where,$order = 'asc')
    {
        $query = $this->db->get_where($table, $where);
        return $query->row();
    }

    public function get($table){
        $query = $this->db->get($table);
        return $query->row();
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

    public function getCount($table, $where)
    {
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get($table)->num_rows();
    }

    public function getAllOrderBy($table, $where = '', $order_by = '', $order = '')
    {
        if (!empty($where)) {
            $this->db->select();
            $this->db->where($where);
            if (!empty($order_by)) {
                if (!empty($order)) {
                    $this->db->order_by($order_by, $order);
                } else {
                    $this->db->order_by($order_by, 'ASC');
                }
            }
            $query = $this->db->get($table);
        } else {
            $this->db->select();
            if (!empty($order_by)) {
                if (!empty($order)) {
                    $this->db->order_by($order_by, $order);
                } else {
                    $this->db->order_by($order_by, 'ASC');
                }
            }
            $query = $this->db->get($table);
        }
        return $query->result();
    }

    public function getOneOrderBy($table, $where = '', $order_by = '', $order = '')
    {
        $this->db->select();
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($order_by)) {
            if (!empty($order)) {
                $this->db->order_by($order_by, $order);
            } else {
                $this->db->order_by($order_by, 'ASC');
            }
        }
        $query = $this->db->get($table);
        return $query->row();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function delete($table, $where)
    {
        $this->db->where($where)->delete($table);
        return $this->db->insert_id();
    }

    public function update($table, $where, $data)
    {
        return $this->db->update($table, $data, $where);
    }

    public function update_batch($table, $data, $key)
    {
        return $this->db->update_batch($table, $data, $key);
    }

    public function insert_batch($table, $data)
    {
        return $this->db->insert_batch($table, $data);
    }

    public function delete_where_not_in($table, $ids, $where, $colunm = 'id')
    {
        $this->db->where($where);
        $this->db->where_not_in($colunm, $ids);
        return $this->db->delete($table);
    }

    public function find_in_set($table, $where, $set, $set_key = "id")
    {
        $this->db->where($where);
        $this->db->where_in($set_key, $set);
        $query = $this->db->get($table);
        // echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function update_question($table, $data, $key)
    {
        if ($data) {
            return $this->db->update_batch($table, $data, $key);
        }
    }


    public function get_candidate_count()
    {
        $this->db->select('count(customer.id) as count');
        $query = $this->db->get('customer');
        if ($query->num_rows() > 0) {
            return $query->row()->count;
        } else {
            return 0;
        }
    }


    public function get_count()
    {
        $this->db->select('sum(rodium.amount) as count');
        $query = $this->db->get('rodium');
        if ($query->num_rows() > 0) {
            return $query->row()->count;
        } else {
            return 0;
        }
    }

    public function get_counts()
    {
        $this->db->select('sum(laiker.amount) as count');
        $query = $this->db->get('laiker');
        if ($query->num_rows() > 0) {
            return $query->row()->count;
        } else {
            return 0;
        }
    }

    public function get_daily_count($current)
    {
        $this->db->select('count(id) as count');
        if($current)
        {
           $current = strtotime($current);
        }
        $this->db->where('created_on  >= ',$current);
        $query = $this->db->get('customer');
        if ($query->num_rows() > 0) {
            return $query->row()->count;
        } else {
            return 0;
        }
    }

    public function get_week_wise_candidates($week)
    {
        $this->db->select('count(id) as count');
        if($week)
        {
            $week = strtotime($week);
        }
        $this->db->where('created_on  >= ',$week);
        $query = $this->db->get('customer');
        if ($query->num_rows() > 0) {
            return $query->row()->count;
        } else {
            return 0;
        }
    }

    public function get_month_wise_candidates($month)
    {
        $this->db->select('count(id) as count');
        if($month)
        {
            $month = strtotime($month);
        }
        $this->db->where('created_on  >= ',$month);
        $query = $this->db->get('customer');
        if ($query->num_rows() > 0) {
            return $query->row()->count;
        } else {
            return 0;
        }
    }

    public function get_year_wise_candidates($year)
    {
        $this->db->select('count(id) as count');
        if($year)
        {
            $year = strtotime($year);
        }
        $this->db->where('created_on  >= ',$year);
        $query = $this->db->get('customer');
        if ($query->num_rows() > 0) {
            return $query->row()->count;
        } else {
            return 0;
        }
    }

    public function get_total_application()
    {
        $this->db->select('count(questions_answer.customer_id) as count');
         $this->db->join('questions_answer', 'questions_answer.customer_id = customer.id');
         $this->db->group_by('questions_answer.customer_id'); 
        $query = $this->db->get('customer');
        if ($query->num_rows() > 0) {
          return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getvideo($id)
    {
         $this->db->select('questions_video.video_url as video,questions_answer.question as question');
        $this->db->join('questions_answer', 'questions_answer.questions_video_uniq = questions_video.uniq_id');
        $this->db->where('questions_video.customer_id', $id);
        $query = $this->db->get('questions_video');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_total_pending()
    {
        $this->db->select('count(questions_answer.customer_id) as count');
        $this->db->join('customer', 'customer.id = questions_answer.customer_id');
        $this->db->where('questions_answer.view',0);
         $this->db->group_by('questions_answer.customer_id'); 
        $query = $this->db->get('questions_answer');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}