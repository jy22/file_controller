<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>리스트</title>
    <link rel="stylesheet" href="../../../assets/css/style.css" type="text/css"/>
</head>


<body>
<?php
if ($this->session->flashdata('message')) {
    ?>
    <script>
        alert('<?=$this->session->flashdata('message')?>');
    </script>
    <?php
}
?>
<br>
<?php
    if ($this->session->userdata('is_login')) {
          if ($this->session->userdata('userinfo') == "관리자") {
              ?>
              <button type="button" onclick="location.href='/main_board/'">메인페이지</button>
              <button type="button" onclick="location.href='/admin_board/'">관리페이지</button>
              <?php
          }
?>
<div class="user_info">
        <span style="font-weight: bold;"><?= $this->session->userdata('username'); ?></span><span> 님 환영합니다!</span>


        <button type="button" onclick="location.href='/login/logout/'">로그아웃</button>
        <?php
    } else {

    }
    ?>
</div>


