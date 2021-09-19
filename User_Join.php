<? include "header.php";?>
<? include "Connect.php";?>
	
	<div class = "NaviBarBG"> </div>
	<div class = "NaviBar">
		<a class = "iconBack" onclick="history.back()"> <img src = "./asset/images/iconBack.svg"> </a>
		<a class = "Title" href = "./index.php"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 회원가입하기 </a>
	</div>

	<?
		$No    = "";
		$ID    = "";
		$PW    = "";
		$PW_2  = "";
		$Name  = "";
		$Date  = "";
		$Sex   = "";
		$Email = "";
		$Role  = "";
		$GET_NO  = "";
		$Mode    = "ADD";
		if (isset($_POST["MemberKakaoID"])){
			$KakaoID = $_POST["MemberKakaoID"];
		} else {
			$KakaoID = "";
		}
		
	?>

	<form action = "AdminMembersSave.php" method="post" enctype="multipart/form-data" name = "MemberSave">
		<input type="hidden" name = "MemberRole" value="사용자">
		<input type="hidden" name = "UserMemberAdd" value="User">
		<input type="hidden" name = "Mode" value="<?=$Mode?>">
		<input type="hidden" name = "MemberKakaoID" value="<?=$KakaoID?>">

		<div class = "User_LoginInputBox" <?=($KakaoID != "")? "style = \"display:none\"":""?>>
			<input type = "text" name = "MemberID" placeholder="아이디" value = "<?=$ID?>" autocomplete="off">
		</div>
		<div class = "User_LoginInputBox" <?=($KakaoID != "")? "style = \"display:none\"":""?>>
			<input type = "text" name = "MemberPW" placeholder="비밀번호" value = "<?=$PW?>" autocomplete="off">
		</div>
		<div class = "User_LoginInputBox" <?=($KakaoID != "")? "style = \"display:none\"":""?>>
			<input type = "text" name = "MemberPW_2" placeholder="비밀번호 확인" value = "<?=$PW_2?>" autocomplete="off">
		</div>
		<div class = "User_LoginInputBox">
			<input type = "text" name = "MemberName" placeholder="이름" value = "<?=$Name?>" autocomplete="off">
		</div>
		<div class = "User_SelectSex">
			<span> 성별 </span>
			<label> <input type = "radio" name = "MemberSex" value="남" <? if ( $Sex == "남") { echo "checked" ;} ?>> 남 </label>
			<label> <input type = "radio" name = "MemberSex" value="여" <? if ( $Sex == "여") { echo "checked" ;} ?>> 여 </label>
		</div>
		<div class = "User_LoginInputBox">
			<input type = "text" name = "MemberEmail" placeholder="이메일 주소" value = "<?=$Email?>" autocomplete="off">
		</div>
		<a class = "User_LoginBtn" onclick="Member_Save()">
			<span> 회원가입하기 </span>
		</a>

		<? include "AdminUpload.php";?>
	</form>
</body>
</html>
