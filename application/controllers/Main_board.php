<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_board extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('is_login')) {
            $this->session->set_flashdata('message', '올바른 접근이 아닙니다.');
            header("Location:./");
        }
        $this->load->model('main_board_model');
    }

    public function index()
    {
        $list = $this->main_board_model->load_boardList(); // 모델클래스에 접근

        //var_dump($list);
        $this->load->view('inc/head');
        $this->load->view('front/main_board', array('list_board' => $list));
        $this->load->view('inc/footer');
    }

    public function view($num)
    {
        $query = $this->main_board_model->load_boardRow($num);

        $this->load->view('inc/head');
        $this->load->view('front/view_board', array('row_board' => $query));
        $this->load->view('inc/footer');
    }


    public function write()
    {
        $this->load->view('inc/head');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('board_title', '제목', 'required');
        $this->form_validation->set_rules('board_contents', '내용', 'required');
        $this->form_validation->set_rules('board_filelist', '파일', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('front/write_board');
        } else {

            $path = array(
                60 => 'application/',
                30 => 'assets/',
                1 => 'application/views'
            );

            $userlevel = $this->session->userdata('userlevel');

            $data = array(
                'user_num' => $this->session->userData('num'),
                'board_title' => $this->input->post('board_title'),
                'board_contents' => $this->input->post('board_contents'),
                'board_filelist' => $this->input->post('board_filelist'),
                'board_modified_userid' => $this->session->userdata('userid'),
                'board_modified_username' => $this->session->userdata('username')
            );

            $cnt = 0;
            $textarea = explode("\n", $this->input->post('board_filelist'));

            foreach ($textarea as $value) {
                if (strpos($value, $path[$userlevel]) === false) {
                    $cnt++;
                }
            }

            if ($userlevel == 100 ||$cnt === 0) {
                $this->main_board_model->addBoardData($data);
                $this->session->set_flashdata('message', '게시글이 작성 되었습니다.');
                header("Location:/main_board");
            } else {
                $this->session->set_flashdata('message', '양식에 맞지 않습니다. 다시 작성해주세요.');
                header("Location:/main_board/write");
            }

        }
        $this->load->view('inc/footer');
    }

    public function update($num)
    {

        $path = array(
            60 => 'application/',
            30 => 'assets/',
            1 => 'application/views'
        );

        $userlevel = $this->session->userdata('userlevel');

        $data = array(
            'board_title' => $this->input->post('board_title'),
            'board_contents' => $this->input->post('board_contents'),
            'board_filelist' => $this->input->post('board_filelist'),
            'board_modified_userid' => $this->session->userdata('userid'),
            'board_modified_username' => $this->session->userdata('username')
        );

        $cnt = 0;
        $textarea = explode("\n", $this->input->post('board_filelist'));

        foreach ($textarea as $value) {
            if (strpos($value, $path[$userlevel]) === false) {
                $cnt++;
            }
        }
        if ($userlevel == 100|| $cnt === 0) {
            $this->main_board_model->update_boardRow($num, $data);
            $this->session->set_flashdata('message', '게시글이 수정 되었습니다.');
            header("Location:/main_board");
        } else {
//            var_dump($userlevel);
//            var_dump($path);
            $this->session->set_flashdata('message', '파일목록이 올바르지 않습니다.');
            echo "<script> history.back(); </script>";
        }
    }


    public function delete($num)
    {
        $data = array('board_status' => 2);

        $this->main_board_model->update_boardRow($num, $data);
        $this->session->set_flashdata('message', '삭제 되었습니다.');
        header("Location:/main_board");
    }
}

?>
