<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_model extends CI_Model {

    public function insert_work($data) {
        // Insert the work data into the "works" table
        $this->db->insert('works', $data);
        return $this->db->insert_id(); // Return the inserted work's ID
    }

    public function insert_work_skills($work_id, $selected_skills) {
        // Insert selected skills into a separate table, e.g., "work_skills"
        foreach ($selected_skills as $skill_id) {
            $this->db->insert('work_skills', array('work_id' => $work_id, 'skill_id' => $skill_id));
        }
    }
    
}
