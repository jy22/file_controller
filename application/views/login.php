<article class="login_form">
    <form action="/login/login_prep" method="post" onsubmit="return loginCheck()">
        <div class="form_layer">
            <div class="notice_banner"> 로그인</div>
            <div class="layer_shadow">
                <div class="container-1">
                    <span class="panel-1">
                       <input type="text" id="userid" name="userid" placeholder="아이디" maxlength="12"/>
                    </span>
                    <span class="panel-1">
                    <input type="password" id="userpwd" name="userpwd" placeholder="비밀번호" maxlength="12"/>
                    </span>
                </div>

                <div class="container-2">
                    <span class="panel-2">
                        <input id="login" type="submit" value="로그인"/>
                    </span>
                </div>
                <div class="sign_btn">
                    <p align="right">
                        <button type="button" onclick="location.href='/login/signup';">회원가입</button>
                    </p>
                </div>
            </div>
        </div>
    </form>
</article>

<script src="http://code.jquery.com/jquery-3.1.1.js"></script>
<script>

    $(document).ready(function () {
        $('#userid').focus();


        document.addEventListener('keydown', function (event) {
            if (event.which === 13) {
                event.preventDefault();
            }
        }, true);
    });

    function loginCheck() {
        var userid = $.trim($('#userid').val());
        var userpwd = $.trim($('#userpwd').val());


        if (userid == "") {
            alert("아이디를 입력하세요");
            $('#userid').focus();
            return false;
        }
        if (userpwd == "") {
            alert("비밀번호를 입력하세요");
            $('#userpwd').focus();
            return false;
        }
        return true;
    }

    // if (userpwd.length < 6) {
    //     alert("비밀번호는 6글자 이상만 가능합니다.");
    //     $('#login_pwd').focus();
    //     return false;
    // }

</script>


