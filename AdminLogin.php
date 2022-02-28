<? include "Admin_Session.php";?>
<? include "header.php";?>
<body>
	<form action = "AdminLoginCheck.php" name = "LogInPage" method="post" enctype="multipart/form-data" class = "BlackBG">

		<div class = "LoginBox">
			<div class = "Title">
				<span class = "blue" > Thanks for </span>
				<span class = "white"> Coming </span>
			</div>
			<div class = "clear"> </div>
			<span class = "SubTitle">
				Administration
			</span>
			<div class = "clear"> </div>
			<table class = "inputBox">
				<tr>
					<td>
						<div class = "Row">
							<div class = "Gray">
								<span class = "Text"> ID </span>
							</div>
							<input type = "text" onKeypress="javascript:if(event.keyCode==13) {$('[name=InputPW]').focus()}" name = "InputID" class = "Input" placeholder= "아이디를 입력하세요" maxlength = "20" autocomplete="off">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class = "Row">
							<div class = "Gray">
								<span class = "Text"> PW </span>
							</div>
							<input type = "password" onKeypress="javascript:if(event.keyCode==13) {LogIn()}" name = "InputPW" class = "Input" placeholder="비밀번호를 입력하세요" maxlength = "20" autocomplete="off">
						</div>
					</td>
				</tr>
			</table>

			<a onclick="LogIn()" class = "BtnLogin"> <span> Log In </span> </a>

			<div class = "JoinBox">
				<span class = "NotMember"> Not a member? </span>
				<a class = "CreateID"> Create your account </a>
			</div>
		</div>

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
		</script>

	</form>	


</body>

</html>