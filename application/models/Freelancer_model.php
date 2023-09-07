<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Freelancer_model extends CI_Model {

    public function register_freelancer($data) {
        // Insert the user registration data into the "users" table
        $user_data = array(
            'username' => $data['email'], // You can use email as the username or create a separate username field
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role' => 'freelancer', // Set the role to 'freelancer'
        );
        $this->db->insert('users', $user_data);

        // Get the user ID of the newly inserted user
        $user_id = $this->db->insert_id();

        // Insert the freelancer-specific data into the "freelancers" table
        $freelancer_data = array(
            'user_id' => $user_id, // Assign the user ID obtained above
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            // Add more freelancer-specific fields as needed
        );
        $this->db->insert('freelancers', $freelancer_data);

        return $user_id; // Return the user ID for further use if needed
    }

    public function add_skill($freelancer_id, $skill_id) {
        // Add a skill to the freelancer's profile
        $data = array(
            'freelancer_id' => $freelancer_id,
            'skill_id' => $skill_id,
        );
        $this->db->insert('freelancer_skills', $data);
    }

    public function remove_skill($freelancer_id, $skill_id) {
        // Remove a skill from the freelancer's profile
        $this->db->where('freelancer_id', $freelancer_id);
        $this->db->where('skill_id', $skill_id);
        $this->db->delete('freelancer_skills');
    }

    public function get_freelancer_skills($freelancer_id) {
        // Retrieve skills associated with the freelancer
        $this->db->select('freelancer_skills.skill_id, skills.skill_name');
        $this->db->from('freelancer_skills');
        $this->db->join('skills', 'skills.id = freelancer_skills.skill_id');
        $this->db->where('freelancer_skills.freelancer_id', $freelancer_id);
        $query = $this->db->get();

        return $query->result();
    }
}
