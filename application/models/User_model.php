<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function authenticate_user($email, $password) {
        // Query the database to authenticate the user
        $query = $this->db->get_where('users', array('email' => $email));

        if ($query->num_rows() == 1) {
            $user = $query->row();

            // Verify the password
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }

        return FALSE; // Authentication failed
    }
}
