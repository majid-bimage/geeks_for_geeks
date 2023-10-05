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

    public function deactivate_skill($id){
        $table = 'skills';
        $data = array(
            'status' => 0,
        );
        $this->db->where('id', $id);
        $this->db->update($table, $data);
        return true;
    }

    public function activate_skill($id){
        $table = 'skills';

        $data = array(
            'status' => 1,
        );
        $this->db->where('id', $id);
        $this->db->update($table, $data);
        return true;

    }
}
