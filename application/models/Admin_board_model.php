<?php
class Admin_board_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function load_userList() {
        // result : 객체
        $this->db->where('userstatus', 1);
        $this->db->order_by('userlevel', 'desc');
        $result = $this->db->get('user')->result();

        return $result;
        //return $this->db->query('SELECT * FROM user ORDER BY userlevel DESC')->result();
    }

    public function load_userRow($num) {
        $this->db->where('num', $num);
        $result = $this->db->get('user')->row();
        return $result;
    }

    public function update_userRow($num, $array=array()) {
        $this->db->set($array);
        $this->db->where('num', $num);
        $this->db->update('user');
    }

 /*   public function delete_userRow($num) {
        $this->db->where('num', $num);
        $this->db->delete('user');
    }*/
}
