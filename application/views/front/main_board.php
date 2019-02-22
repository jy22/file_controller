
<article class="main_board">
    <form action="" method="post" onsubmit="">
        <div class="view_layer">
            <div class="layer_shadow">
                <!--공지사항'-->
                <div class="top_notice">
                    <p align="right">
                    </p>
                </div>
                <div class="container-info">
                    <br>
                    <div class="dashed_line">
                        <br>
                        <table width="100%" border="0px" cellspacing="1" cellpadding="0">
                            <thead>
                            <tr class="tr3" align="center">
                                <td>번호</td>
                                <td>작성제목</td>
                                <td>배포날짜</td>
                                <td>수정날짜</td>
                                <td>작성자</td>
                            </tr>
                            </thead>
                            <tbody class="manager_list">
                            <?php
                            foreach ($list_board as $list) {
                                ?>
                                <tr class="tr4" align="center" onclick="location.href='/main_board/view/<?= $list->board_num ?>'">
                                    <!--작성번호-->
                                    <td style="width: 4%; font-weight: bold;">
                                        <span><?= $list->board_num ?></span>
                                    </td>
                                    <!--작성제목-->
                                    <td style="width: 20%">
                                        <span><?= $list->board_title ?></span>
                                    </td>

                                    <!--배포날짜-->
                                    <td style="width: 13%">
                                        <span><?= $list->board_create_date ?></span>
                                    </td>
                                    <!--수정날짜-->
                                    <td style="width: 13%">
                                        <span><?= $list->board_modified_date ?></span>
                                    </td>
                                    <!--작성자-->
                                    <td style="width: 13%">
                                        <span><?= $list->username ?>(<?= $list->userid ?>)</span>
                                    </td>
                                </tr>
                                <!--                <tr align="center">-->
                                <!--                    <td colspan="6" style="font-weight: bold;" >내역이 존재하지 않습니다.</td>-->
                                <!---->
                                <!--                </tr>-->
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <br>
                        <!-- 추후에 페이지 넘기기 // 로그별 기록보기 -->
                    </div>
                    <br>
                    <div align="right">
                        <button type="button" type="button" onclick="location.href='/main_board/write';">추가</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</article>

