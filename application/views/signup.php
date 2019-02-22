<article class="validation_form">
    <!-- 모달창으로 만들기-->
    <form action="/login/signup" method="post" onsubmit="return signUp()">
        <?php echo validation_errors(); ?>
        <div class="form_layer">
            <div class="notice_banner"> 회원가입</div>
            <div class="layer_line">
                <!--이름-->
                <div class="container">
                    <span class="important">*</span>
                    <input type="text" id="username" name="username" placeholder="이름" maxlength="6"/>
                </div>

                <!--아이디-->
                <div class="container">
                    <span class="important">*</span>
                    <input type="text" id="userid" name="userid" placeholder="아이디" maxlength="12"/>
                </div>

                <!--비밀번호-->
                <div class="container">
                    <span class="important">*</span>
                    <input type="password" id="userpwd" name="userpwd" placeholder="비밀번호" maxlength="12"/>
                </div>

                <!--비밀번호-->
                <div class="container">
                    <span class="important">*</span>
                    <input type="password" id="userCpwd" name="userCpwd" placeholder="비밀번호 재확인" maxlength="12"/>
                </div>
                <!--                <div class="container">-->
                <!--                    <span class="important">*</span>-->
                <!--                    <input type="text" id="birth" placeholder="생일" disabled/>-->
                <!--                    <input type="text" id="useryear" name="useryear" placeholder="ex) 1995" maxlength="4"/>-->
                <!--                    <select name="usermonth" id="usermonth">-->
                <!--                        <option value=" " seleted="selected"> 월</option>-->
                <!--                        <option value="1"> 1</option>-->
                <!--                        <option value="2"> 2</option>-->
                <!--                        <option value="3"> 3</option>-->
                <!--                        <option value="4"> 4</option>-->
                <!--                        <option value="5"> 5</option>-->
                <!--                        <option value="6"> 6</option>-->
                <!--                        <option value="7"> 7</option>-->
                <!--                        <option value="8"> 8</option>-->
                <!--                        <option value="9"> 9</option>-->
                <!--                        <option value="10"> 10</option>-->
                <!--                        <option value="11"> 11</option>-->
                <!--                        <option value="12"> 12</option>-->
                <!--                    </select>-->
                <!--                    <input type="stext" id="userday" name="userday" placeholder="일" maxlength="2"/>-->
                <!--                </div>-->


                <!--                <div class="container">-->
                <!--                    <span class="important">*</span>-->
                <!--                    <input type="email" name="useremail" placeholder="본인확인 이메일"/>-->
                <!--                </div>-->
                <!---->
                <!--                          <div class="container">-->
                <!--                    <select disabled>-->
                <!--                        <option value="number"> +82</option>-->
                <!--                    </select>-->
                <!--                    <span class="important">*</span>-->
                <!--                    <input type="text" id="pNumber" placeholder="휴대전화번호"/>-->
                <!--                    <input type="hidden" name="userpnumber" id="pNumber_i"/>-->
                <!--                    <button type="button">인증</button>-->
                <!--                </div>-->
            </div>
             <button type="submit">가입하기</button>
        </div>
    </form>

    <script src="http://code.jquery.com/jquery-3.1.1.js"></script>
    <script>

        $(document).ready(function () {
            $('#username').focus();


            document.addEventListener('keydown', function (event) {
                if (event.which === 13) {
                    event.preventDefault();
                }
            }, true);
        });

        function signUp() {
            var username = $.trim($('#username').val());
            var userid = $.trim($('#userid').val());
            var userpwd = $.trim($('#userpwd').val());
            var usercpwd = $.trim($('#userCpwd').val());
            // var useryear = $.trim($('#useryear').val());
            // var usermonth = $.trim($('#usermonth').val());
            // var userday = $.trim($('#userday').val());

            for (var i = 0; i < username.length; i++) {
                if (!((username.charCodeAt(i) > 0x3130 && username.charCodeAt(i) < 0x318F) ||
                    (username.charCodeAt(i) >= 0xAC00 && username.charCodeAt(i) <= 0xD7A3))) {
                    alert("이름은 한글만 입력해주세요");
                    $('#username').focus();
                    return false;
                }
            }

            if (username == "") {
                alert("이름을 입력하세요");
                $('#username').focus();
                return false;
            }

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

            if (userpwd != usercpwd) {
                alert("비밀번호가 일치하지 않습니다");
                $('#userCpwd').focus();
                return false;
            }
            return true;
        }

        // if (useryear == "") {
        //     alert("년을 입력하세요");
        //     $('#useryear').focus();
        //     return false;
        // }
        //
        // if (usermonth == "") {
        //     alert("달을 선택하세요");
        //     $('#usermonth').focus();
        //     return false;
        // }
        //
        // if (userday == "") {
        //     alert("일을 입력하세요");
        //     $('#userday').focus();
        //     return false;
        // }
    </script>
</article>
