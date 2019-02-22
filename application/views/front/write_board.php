

<article class="main_board">
    <form action="/main_board/write" method="post">
        <div class="view_layer">
            <div class="layer_shadow">
                <!--공지사항'-->
                <div class="top_notice">
                    <span>공지 : 입력양식에 맞춰서 입력해주세요.</span>
                </div>

                <div class="container-info">
                    <br>
                    <div class="body_notice">
                        <?php
                        if ($this->session->userdata('is_login')) {
                            ?>

                            <strong>자신의 권한을 확인하세요!</strong><br>
                            <span><?= $this->session->userdata('username') ?> 님의 접근권한은</span>
                            <span><?= $this->session->userdata('userinfo') ?></span> 단계 입니다.
                            <?php
                        }
                        ?>
                    </div>
                    <br>
                    <div class="dashed_line">
                        <br>
                        <!--각 내용-->
                        <div class="contents-1"><span style="color:red;">* </span>제목</div>
                        <input name="board_title" type="text" placeholder="제목을 입력하세요."><br><br>
                        <div class="contents-1"><span style="color:red;">* </span>내용</div>
                        <textarea name="board_contents" placeholder="내용을 입력하세요."></textarea><br><br>

                        <div class="contents-1"><span style="color:red;">* </span>파일접근</div>
                        <textarea name="board_filelist" placeholder="접근경로를 입력해주세요."></textarea><br><br>
                    </div>
                    <br>

                    <div align="right">
                        <button type="button" onclick="location.href='/main_board';">뒤로가기</button>
                        <button type="submit">배포</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</article>

