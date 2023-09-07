<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skill_model extends CI_Model {

    public function insert_skill($data) {
        // Insert the skill data into the "skills" table
        $this->db->insert('skills', $data);
    }

    public function get_skills() {
        // Retrieve skills from the "skills" table
        $query = $this->db->get('skills');

        // Check if there are any skills in the database
        if ($query->num_rows() > 0) {
            return $query->result(); // Return an array of skill objects
        } else {
            return array(); // Return an empty array if no skills are found
        }
    }
}
