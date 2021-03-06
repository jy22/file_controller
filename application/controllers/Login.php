<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	//TODO: 세션데이터 define 정의?=
	function index()
	{
		if ($this->session->userdata('is_login')) {
			$this->session->set_flashdata('message', '올바른 접근이 아닙니다. 다시 로그인 해주세요.');
			$this->logout();
		}
		$this->load->view('inc/head');
		$this->load->view('login');
		$this->load->view('inc/footer');
	}

	function login_prep()
	{
		$this->load->model('login_model');

		$userid = array(
			'userid' => $this->input->post('userid')
		);

		$user = $this->login_model->getUserData($userid);
		
		//password_verify($this->input->post('userpwd'), $user->userpwd)) {
		if ($this->input->post('userid') == $user->userid &&
			$this->input->post('userpwd') == $user->userpwd) {
			$this->create_session($user);

			if ($user->userlevel == 100) {
				header("Location:/admin_board");
			} else {
				header("Location:/main_board");
			}
		} else {
			$this->session->set_flashdata('message', '아이디와 패스워드를 다시 확인해주세요.');
			header('Location:/login');
		}
	}


	function signup()
	{
		$this->load->model('login_model');
		$this->load->library('form_validation');

		$this->load->view('inc/head');

		$this->form_validation->set_rules('username', '이름', 'required');
		$this->form_validation->set_rules('userid', '아이디', 'trim|required|min_length[2]|max_length[20]');
		$this->form_validation->set_rules('userpwd', '비밀번호', 'required|min_length[2]|max_length[30]|matches[userCpwd]');
		$this->form_validation->set_rules('userCpwd', '비밀번호 확인', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->view('signup');
		} else {
			//$hash = password_hash($this->input->post('userpwd'), PASSWORD_BCRYPT);
			$datalist = array(
				'username' => $this->input->post('username'),
				'userid' => $this->input->post('userid'),
				'userpwd' => $this->input->post('userpwd')
			);

			$this->login_model->setUserData($datalist);
			$this->session->set_flashdata('message', '회원가입 되었습니다. 관리자의 승인이 필요합니다.');
			header("Location:/login");
		}
		$this->load->view('inc/footer');
	}


	function create_session($data)
	{
		$session = array(
			'is_login' => true,
			'num' => $data->num,
			'userid' => $data->userid,
			'username' => $data->username,
			'userinfo' => $data->userinfo,
			'userlevel' => $data->userlevel,
		);

		$this->session->set_userdata($session);
	}


	function logout()
	{
		$this->session->sess_destroy();
		header('Location:/login');
	}
}


?>
