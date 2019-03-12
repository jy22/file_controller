<?php

class Login_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function setUserData($users=array())
    {
        $this->db->set($users);
        $this->db->set('userdate', 'NOW()', false);
        $this->db->insert('user');
        $result = $this->db->insert_id();

        return $result;
    }


    function getUserData($users=array())
    {
        $result = $this->db->get_where('user', $users)->row();
        return $result;
    }
}