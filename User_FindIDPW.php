<? include "User_Session.php";?>
<? include "header.php";?>

	<div class = "NaviBarBG"> </div>
	<div class = "NaviBar">
		<a class = "iconBack" onclick="history.back()"> <img src = "./asset/images/iconBack.svg"> </a>
		<a class = "Title" href = "./index.php"> 아이디 찾기 </a>
	</div>
	<form action = "User_IntroduceIDPW.php" method="post" enctype="multipart/form-data" id = "FindID">
		<input type ="hidden" name = "UserMode" value="1">

		<div class = "User_LoginInputBox">
			<input type = "text" name = "InputName" placeholder = "이름" autocomplete = "off">
		</div>
		<div class = "User_LoginInputBox">
			<input type = "password" name = "InputEmail" placeholder = "이메일 주소" autocomplete = "off">
		</div>
		<a class = "User_LoginBtn" onclick="JS_FindID()">
			<span> 아이디 찾기 </span>
		</a>
	</form>

	<!-- //////////////////////////////////// -->
<!-- 
	<form action = "User_IntroduceIDPW.php" method="post" enctype="multipart/form-data" id = "FindPW" style="display:none">
		<input type ="hidden" name = "UserMode" value="1">

		<div class = "User_LoginInputBox">
			<input type = "text" name = "InputID" placeholder = "아이디" autocomplete = "off">
		</div>
		
		<a class = "User_LoginBtn" onclick="JS_FindPW()">
			<span> 비밀번호 찾기 </span>
		</a>
	</form> -->

	<!-- //////////////////////////////////// -->

	<script type="text/javascript">
		function JS_FindID(){
			if ($('[name=InputName]').val()=="") {
				alert ("이름을 입력해주세요");
				return false;
			} else if ($('[name=InputEmail]').val()=="") {
				alert ("이메일주소를 입력해주세요");
				return false;
			} else {
				document.forms["FindID"].submit();
			}
		}

/*		function JS_FindPW(){
			if ($('[name=InputID]').val()=="") {
				alert ("이름을 입력해주세요");
				return false;
			} else {
				document.forms["FindPW"].submit();
			}
		}*/

		function ChangeID(){
	        if(document.getElementById("ID").className = 'NonSelectIDPW') {
	            document.getElementById("ID").className = 'SelectIDPW';
	            document.getElementById("PW").className = 'NonSelectIDPW';

	            $('#FindID').css("display","block");
	            $('#FindPW').css("display","none");
	        }
	    }

/*	    function ChangePW(){
	        if(document.getElementById("PW").className = 'NonSelectIDPW') {
	        	document.getElementById("ID").className = 'NonSelectIDPW';
	            document.getElementById("PW").className = 'SelectIDPW';

	            $('#FindID').css("display","block");
	            $('#FindPW').css("display","none");
	        }
	    }*/
	</script>

</body>
</html>