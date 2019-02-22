<?php

class Main_board_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function load_boardList() {

        $this->db->where('board_status', 1);
        $this->db->join('board', 'board.user_num = user.num');
        $this->db->order_by('board_num', 'desc');
        $result = $this->db->get('user')->result();

        return $result;
    }

    function load_boardRow($num) {
        $this->db->where('board_num', $num);
        $this->db->join('board', 'board.user_num = user.num');
        $result = $this->db->get('user')->row();

        return $result;
    }

    function load_boardName($a) {
        $this->db->where($a);
        $this->db->join('board', 'board.user_num = user.num');
        $this->db->order_by('board_num', 'desc');
        $result = $this->db->get('user')->row();

        return $result;
    }


    function update_boardRow($num, $board=array()) {
        $this->db->set($board);
        $this->db->set('board_modified_date', 'NOW()', false);
        $this->db->where('board_num', $num);
        $this->db->update('board');
    }


    function addBoardData($board=array())
    {
        $this->db->set($board);
        $this->db->set('board_create_date', 'NOW()', false);
        $this->db->set('board_modified_date', 'NOW()', false);
        $this->db->insert('board');
        $result = $this->db->insert_id();

        return $result;
    }




}