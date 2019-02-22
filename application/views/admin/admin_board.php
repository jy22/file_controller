<article class="admin-board">
    <form action="" method="post">
    <div class="view_layer">
        <div class="notice_banner">권한 리스트
        </div>
        <div class="layer_shadow" style="margin-top:10px;">
            <table width="100%" border="0px" cellspacing="1" cellpadding="0">
                <thead>
                <tr class="tr1" align="center">
                    <td>이름</td>
                    <td>아이디</td>
                    <td>레벨</td>
                    <td>종류</td>
                    <td>가입날짜</td>
                    <td>기타</td>
                </tr>
                </thead>
                <tbody class="manager_list">
                <?php
                foreach ($list_user as $user) {
                    ?>
                    <tr class="tr2" align="center">
                        <!--이름-->
                        <td style="color:black; font-weight: bold; width: 10%">
                            <span><?= $user->username ?></span>
                        </td>

                        <!--아이디-->
                        <td style="width: 10%">
                            <span><?= $user->userid ?></span>
                        </td>

                        <!--레벨-->
                        <td style="width: 5%;">
                            <span><?= $user->userlevel ?></span>
                        </td>

                        <!--종류-->
                        <td style="width: 10%">
                            <span><?= $user->userinfo ?></span>
                        </td>

                        <!--가입날짜-->
                        <td style="width: 15%">
                            <span><?= $user->userdate ?></span>
                        </td>
                        <!--제어권한-->
                        <td style="width: 10%" class="control_panel">
                            <button type="button" class="modify_btn"
                                    onclick="location.href='/admin_board/user_detail/<?= $user->num ?>';">수정</button>
                            <button type="button" class="delete_btn"
                                    onclick="location.href='/admin_board/user_detail_delete/<?= $user->num ?>';">삭제
                            </button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                <!--                <tr align="center">-->
                <!--                    <td colspan="6" style="font-weight: bold;" >내역이 존재하지 않습니다.</td>-->
                <!---->
                <!--                </tr>-->
                </tbody>
            </table>
        </div>
    </div>
    </form>
</article>

<script>
</script>