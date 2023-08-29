<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_Model {
    
    public function login($email, $password){
        $this->db->select('id, first_name, last_name, email, phone, entity, manager, department, lattitude, longitude, device_id');
        $this->db->where('password', $password);
        $this->db->where('email', $email);
        $query = $this->db->get('employee');
        if ($query->num_rows() > 0) {
            return $query->row();
        }else{
            return false;
        }
    }
    
    public function update($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    public function register($data) {
        // Add customer
        $this->db->insert('customers', $data);
        $id = $this->db->insert_id();

        // Get Customer 
        $this->db->select('id, name, email, phone');
        $this->db->where('id', $id);
        $query = $this->db->get('customers');
        return $query->row();
    }

    public function validate_email($email){
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function forgot_password($email, $user_id){
        $customer = $this->db->get_where('customers', array('user_id' => $user_id, 'email' => $email))->row();
        if ($customer) {
            $forgot['forgotten_code'] = id_crypt($customer->id . time());
            $forgot['forgotten_time'] = time();
            $this->db->where(array('id' => $customer->id));
            $this->db->update('customers', $forgot);
            return $this->db->get_where('customers', array('user_id' => $user_id, 'email' => $email))->row();
        }else{
            return false;
        }
    }

    public function social_login($data){
        // Check if token exist
        $is_exist = $this->db->get_where('customers', array('type' => $data['type'], 'token' => $data['token'], 'user_id' => $data['user_id']))->row();
        if (empty($is_exist)) {
            // Create User 
            $this->db->insert('customers', $data);
            $id = $this->db->insert_id();

            // return created user
            return $this->db->get_where('customers', array('id' => $id))->row();
        }else{
            return $is_exist;
        }
    }

    public function update_profile($id, $data){
        // Update customer
        $this->db->where('id', $id);
        $this->db->update('customers', $data);

        // Return updated customer
        $this->db->select('id, user_id, name, email, phone, type');
        $this->db->where('id', $id);
        return $this->db->get('customers')->row();
    }
}
