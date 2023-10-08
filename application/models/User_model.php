<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function authenticate_user($email, $password) {
        // Query the database to authenticate the user
        $query = $this->db->get_where('users', array('email' => $email, 'status' => 1));

        if ($query->num_rows() == 1) {
            $user = $query->row();

            // Verify the password
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }

        return FALSE; // Authentication failed
    }

    
    public function disable_user($id){
        $table = 'users';
        $data = array(
            'status' => 0,
        );
        $this->db->where('id', $id);
        $this->db->update($table, $data);
        return true;
    }

    public function enable_user($id){
        $table = 'users';

        $data = array(
            'status' => 1,
        );
        $this->db->where('id', $id);
        $this->db->update($table, $data);
        return true;

    }

    public function delete_user($id,$a){
       
        if($a){
            $this->db->where('user_id', $id); // Delete rows where the 'id' column equals 5
            $this->db->delete('freelancers'); // Delete from the 'my_table' table
            
        }else{
            $this->db->where('user_id', $id); // Delete rows where the 'id' column equals 5
            $this->db->delete('customers'); // Delete from the 'my_table' table

        }
        $this->db->where('id', $id); // Delete rows where the 'id' column equals 5
        $this->db->delete('users'); // Delete from the 'my_table' table
        return true;
    }
    public function check_email($email){
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        // Check if there is a row with the given email
        return ($query->num_rows());
    }

    public function update_password($email,$password){
       $pass = password_hash($password, PASSWORD_DEFAULT);
       $table = 'users';
       $data = array(
           'password' => $pass,
       );
       $this->db->where('email', $email);
       $this->db->update($table, $data);
       return true;
    }
}
