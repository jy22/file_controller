<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_board extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('userlevel') != 100) {
            $this->session->set_flashdata('message', '접근권한이 없습니다.');
            header("Location:./main_board");
        }

        if (!$this->session->userdata('is_login')) {
            $this->session->set_flashdata('message', '올바른 접근이 아닙니다.');
            header("Location:./");
        }

        $this->load->model('admin_board_model');
}

    public function index()
    {
        $list = $this->admin_board_model->get_userList();
        $this->load->view('inc/head');
        $this->load->view('admin/admin_board', array('list_user' => $list));
        $this->load->view('inc/footer');
    }

    public function user_management() {

        $list = $this->admin_board_model->wait_userList();
        $this->load->view('inc/head');
        $this->load->view('admin/admin_board', array('list_user' => $list));
        $this->load->view('inc/footer');
    }

    public function user_agree() {

    }

    public function user_detail($num)
    {
        $index = $this->admin_board_model->get_user($num);

        $this->load->view('inc/head');
        $this->load->view('admin/admin_board_modify', array('row_user' => $index));
        $this->load->view('inc/footer');
    }

    public function user_detail_update($num)
    {
        $array = array(
            'userlevel' => $this->input->post('userlevel'),
            'userinfo' => $this->input->post('userinfo')
        );

//       var_dump($array);
        //TODO : 수정날짜 추가

        $this->admin_board_model->update_user($num, $array);

        $this->session->set_flashdata('message', '수정 되었습니다.');
        header("Location:/admin_board");
    }

    public function user_detail_delete($num)
    {
        $array = array(
            'userstatus' => 2
        );

        $this->admin_board_model->update_user($num, $array);

        $this->session->set_flashdata('message', '삭제 되었습니다.');
        header("Location:/admin_board");
        //TODO: 데이터가 아무것도 없다면 세션 종료 및 로그인 페이지로 이동
    }
}

?>
