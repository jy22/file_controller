<article class="admin-board">
    <form action="/admin_board/user_detail_update/<?= $row_user->num ?>" method="post">
        <div class="view_layer">
            <div class="notice_banner">수정
            </div>
            <div class="layer_shadow" style="margin-top:10px;">
                <table width="100%" border="0px" cellspacing="1" cellpadding="0">
                    <thead>
                    <tr class="tr1" align="center">
                        <td>이름</td>
                        <td>아이디</td>
                        <td>레벨</td>
                        <td>종류</td>
                        <td>기타</td>
                    </tr>
                    </thead>
                    <tbody class="manager_list">
                    <tr class="tr2" align="center">
                        <!--이름-->
                        <td style="color:black; font-weight: bold; width: 10%">
                            <input name="username" type="text" value="<?= $row_user->username ?>" disabled/>
                        </td>

                        <!--아이디-->
                        <td style="width: 10%">
                            <input name="userid" type="text" value="<?= $row_user->userid ?>" disabled/>
                        </td>

                        <!--레벨-->
                        <td style="width: 5%;">
                            <?php
                            $level = $row_user->userlevel;
                            ?>
                            <select id="userlevel" name="userlevel">
                                <option value="100" <?= $level == 100 ? 'selected' : NULL; ?>>100</option>
                                <option value="60" <?= $level== 60 ? 'selected' : NULL; ?>> 60</option>
                                <option value="30" <?= $level == 30 ? 'selected' : NULL; ?>> 30</option>
                                <option value="1" <?= $level == 1 ? 'selected' : NULL; ?>> 1</option>
                            </select>
                        </td>

                        <!--종류-->
                        <td align="center" style="width: 10%">
                            <?php
                            $info = $row_user->userinfo;
                            ?>
                            <select id="userinfo" name="userinfo">
                                <option value="관리자" <?= $info == "관리자" ? 'selected' : NULL; ?>>관리자</option>
                                <option value="개발" <?= $info == "개발" ? 'selected' : NULL; ?>>개발</option>
                                <option value="디자인" <?= $info == "디자인" ? 'selected' : NULL; ?>>디자인</option>
                                <option value="일반" <?= $info == "일반" ? 'selected' : NULL; ?>>일반</option>
                            </select>
                        </td>
                        <!--제어권한-->
                        <td style="width: 13%" class="control_panel">
                            <!-- update -->
                            <button type="submit" class="add_btn">저장
                            </button>
                            <button type="button" class="cancel_btn"
                                    onclick="location.href='/admin_board/';">취소
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</article>
<script src="http://code.jquery.com/jquery-3.1.1.js"></script>
<script>

    $('#userlevel').change(function () {
        var user_level = $("#userlevel option").index($("#userlevel option:selected"));
        $("#userinfo option:eq(" + user_level + ")").prop("selected", "selected");
    });

    $('#userinfo').change(function () {
        var user_info = $("#userinfo option").index($("#userinfo option:selected"));
        $("#userlevel option:eq(" + user_info + ")").prop("selected", "selected");
    });
</script>
