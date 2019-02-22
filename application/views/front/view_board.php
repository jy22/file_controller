<article class="main_board">
    <form action="/main_board/update/<?= $row_board->board_num ?>" method="post">
        <div class="view_layer">
            <div class="layer_shadow">
                <!--공지사항'-->

                <div class="top_notice">
                    <span>선택하신 게시물의 내용입니다.</span>
                </div>
                <div class="container-info">
                    <div class="body_notice">
                        <span>작성 일자 : <?= $row_board->board_create_date . '  (' . $row_board->userid . '/' .
                            $row_board->username . ')' ?></span><br>
                        <span>수정 일자 : <?= $row_board->board_modified_date . '  (' . $row_board->board_modified_userid . '/' .
                            $row_board->board_modified_username . ')'?></span><br>
<!--                        <span>롤백 일자 : --><?//= $row_board->board_rollback_date ?><!--</span>-->
                    </div>
                    <br>
                    <div class="dashed_line">
                        <br>
                        <!--각 내용-->
                        <div class="contents-1"><span style="color:red;">* </span>제목</div>
                        <input name="board_title" type="text" value="<?= $row_board->board_title ?>"><br><br>
                        <div class="contents-1"><span style="color:red;">* </span>내용</div>
                        <textarea name="board_contents"><?= $row_board->board_contents ?></textarea><br><br>

                        <div class="contents-1"><span style="color:red;">* </span>파일목록</div>
                        <textarea name="board_filelist"><?= $row_board->board_filelist ?></textarea><br><br>
                    </div>
                    <br>

                    <div align="right">
                        <button type="button" onclick="location.href='/main_board';">뒤로가기</button>
                        <?php if ($this->session->userData('userid') == $row_board->userid ||
                            $this->session->userData('userinfo') == "관리자" ||
                            $this->session->userData('userlevel') == $row_board->userlevel ) {
                            ?>
                            <button type="submit">수정</button>
                            <button type="button" onclick="location.href='/main_board/delete/<?= $row_board->board_num ?>';">삭제</button>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
</article>
<script src="http://code.jquery.com/jquery-3.1.1.js"></script>



