<? include "header.php";?>
<? include "Connect.php";?>
<script src="https://developers.kakao.com/sdk/js/kakao.js"> </script>

	<div class = "NaviBarBG"> </div>
	<div class = "NaviBar">
		<a class = "iconBack" onclick="history.back()"> <img src = "./asset/images/iconBack.svg"> </a>
		<a class = "Title" href = "./index.php"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 로그인 하기 </a>
	</div>

	<form action = "AdminLoginCheck.php" method="post" enctype="multipart/form-data" name = "LogInPage">
		<input type ="hidden" name = "UserKakao" value="">
		<input type ="hidden" name = "UserMode"  value="1">
		<div class = "User_LoginImage">
			<img src = "./asset/images/nunch(1).svg" >
		</div>
		<div class = "User_LoginInputBox">
			<input type = "text" name = "InputID" placeholder="아이디" autocomplete="off">
		</div>
		<div class = "User_LoginInputBox">
			<input type = "password" name = "InputPW" placeholder="비밀번호" autocomplete="off">
		</div>
		<a class = "User_LoginBtn" onclick="LogIn()">
			<span> 로그인하기 </span>
		</a>
		<div class = "User_LoginHelp">
			<a href = "./User_Join.php"> 회원가입하기 </a>
			<span> / </span>
			<a href="User_FindIDPW.php"> 아이디·비밀번호찾기 </a>
		</div>
		<a class = "User_KaKaoLoginBtn" onclick="KakaoLogin()"> <img src="./asset/images/snsLogin/kakao_login_large.png"> </a>
	
		<script type="text/javascript">
			function LogIn(){
				if ($('[name=InputID]').val()=="") {
					alert ("아이디를 입력해주세요");
					return false;
				} else if ($('[name=InputPW]').val()=="") {
					alert ("비밀번호를 입력해주세요");
					return false;
				} else {
					document.forms["LogInPage"].submit();
				}
			}

		///////////////////////////////////////////////////////////////////////
			Kakao.init('b57f6faa985f2a6771a6f19618cd919c');
			Kakao.isInitialized();

			function KakaoLogin(){
				Kakao.Auth.login({
	              success: function(authObj) { // 로그인 했을 때 성공 여부 불러옴
	                 Kakao.API.request({
	                   url: '/v2/user/me',
	                   success: function(res) { // 로그인한 사람의 개인정보 불러옴
	                    console.log(JSON.stringify(res));
	                    //alert(res.id);
	                    console.log(res.id);
	                    document.LogInPage.UserKakao.value = res.id;
	                    document.forms["LogInPage"].submit();
	                   },
	                   fail: function(error) {
	                     //alert(JSON.stringify(error));
	                   }
	                 });
	              },
	              fail: function(err) {
	                //alert(JSON.stringify(err));
	              }
	            });
			}
			// Kakao.Auth.authorize({
			//   // redirectUri: '{REDIRECT_URI}'
			// });
		</script>

	</form>
</body>
</html>