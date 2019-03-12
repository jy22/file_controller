<?php
class Admin_board_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function get_userList() {
        // result : 객체
        $this->db->where('userstatus', 1);
        $this->db->order_by('userlevel', 'desc');
        $result = $this->db->get('user')->result();

        return $result;
    }

	public function wait_userList() {
		$this->db->where('userstatus', 0);
		$this->db->order_by('userdate', 'desc');
		$result = $this->db->get('user')->result();

		return $result;
	}

    public function get_user($num) {
        $this->db->where('num', $num);
        $result = $this->db->get('user')->row();
        return $result;
    }

    public function update_user($num, $array=array()) {
        $this->db->set($array);
        $this->db->where('num', $num);
        $this->db->update('user');
    }
}
