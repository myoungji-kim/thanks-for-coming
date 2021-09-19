<? include "Admin_Session.php";?>
<? include "header.php";?>
<? include "Connect.php";?>

	<?
		$No    = "";
		$ID    = "";
		$PW    = "";
		$Name  = "";
		$Date  = "";
		$Sex   = "";
		$Email = "";
		$Role  = "";
		$BtnUpload = "저장하기";
		$PageTitle = "회원 정보 수정 페이지";
		$GET_NO    = "";
		$Mode      = "ADD";

		if (isset($_GET['no'])) { // 수정 페이지
			$sql="SELECT * FROM Member WHERE Member_No=".$_GET['no']."";
	        $result=mysqli_query($connect,$sql);
	        $row=mysqli_fetch_assoc($result);

	        $GET_NO  = $_GET['no'];
	        $No      = $row['Member_No'];
			$ID      = $row['Member_ID'];
			$PW      = $row['Member_PW'];
			$Name    = $row['Member_Name'];
			$Date    = $row['Member_Date'];
			$Sex     = $row['Member_Sex'];
			$Email   = $row['Member_Email'];
			$Role    = $row['Member_Role'];
			$Mode    = "EDIT";


		} else { // 최초 업로드 페이지
		    $BtnUpload = "등록하기";
		    $PageTitle = "회원 정보 등록 페이지";
		}
	?>

	<form action = "AdminMembersSave.php" method="post" enctype="multipart/form-data" name = "MemberSave">
		<div class = "TopMenu">
			<div class = "Title">
				<span class = "blue"> Thanks for </span>
				<span class = "white"> Coming </span>
				<span class = "gray"> Administration </span>
			</div>

			<div class = "Btn">
				<a class = "Text" href = "AdminMembers.php"> 취소 </a>
				<input type = "button" id = "MemberSave" onclick = "Member_Save()" class = "Upload" value="<?=$BtnUpload;?>">
			</div>
		</div>

		<div class = "UploadBody">
			<div class = "Category">
				<span class = "Text"> <?=$PageTitle?> </span>
			</div>
			<div class = "EditBox">
				<table>
					<tr>
						<? if (isset($_GET['no'])) { ?>
							<td class = "Rows">
								<span class = "Kinds">
									회원번호
								</span>
								<div class = "Text FontsGray">
									<span> <?=$No;?> </span>
								</div>
							</td>
						<? } ?>
					</tr>
					<tr> 
						<td> <input type="hidden" name="Member_No" value="<?=$No;?>"> </td>
						<td> <input type="hidden" name="Mode" value="<?=$Mode?>"> </td> 
					</tr>
					<tr> <td class = "Rows">
						<span class = "Kinds">
							구분
						</span>
						<? if (isset($_GET['no'])) { ?>
							<div class = "Text FontsGray">
								<span> <?=$Role?> </span>
							</div>
						<? } else { ?>
							<div class = "Text FontsGray">
								<input type = "text" name = "MemberRole" placeholder="역할을 입력하세요(사용자/관리자)">
							</div>
						<? } ?>
					</td> </tr>
					<tr> <td class = "Rows">
						<span class = "Kinds">
							이름
						</span>
						<div class = "Text FontsBlack">
							<input type = "text" name = "MemberName" value = "<?=$Name?>" placeholder="이름을 입력하세요">
						</div>
					</td> </tr>
					<tr> <td class = "Rows">
						<span class = "Kinds">
							성별
						</span>
						<div class = "Text FontsBlack">
							<label> <input type = "radio" name = "MemberSex" value="남" 
								<? if ( $Sex == "남") { echo "checked" ;} ?>> 남 </label>
							<label> <input type = "radio" name = "MemberSex" value="여" 
								<? if ( $Sex == "여") { echo "checked" ;} ?>> 여 </label>
						</div>
					</td> </tr>
					<tr> <td class = "Rows">
						<span class = "Kinds">
							아이디
						</span>
						<div class = "Text FontsBlack">
							<input type = "text" name = "MemberID" value = "<?=$ID?>" placeholder="아이디를 입력하세요">
						</div>
					</td> </tr>
					<tr> <td class = "Rows">
						<span class = "Kinds">
							패스워드
						</span>
						<div class = "Text FontsBlack">
							<input type = "text" name = "MemberPW" value = "<?=$PW?>" placeholder="패스워드를 입력하세요">
						</div>
					</td> </tr>
					<tr> <td class = "Rows">
						<span class = "Kinds">
							이메일주소
						</span>
						<div class = "Text FontsBlack">
							<input type = "text" name = "MemberEmail" value = "<?=$Email?>" placeholder="이메일을 입력하세요">
						</div>
					</td> </tr>
					<tr>
						<? if (isset($_GET['no'])) { ?>
							<td class = "Rows">
								<span class = "Kinds">
									가입일
								</span>
								<div class = "Text FontsGray">
									<span> <?=$Date?> </span>
								</div>
							</td>
						<? } ?>
					</tr>
				</table>
			</div>
			<? if (isset($_GET['no'])) { ?>
				<a class = "IconDelete" onclick="Member_Remove()"> <img src = "./asset/images/IconDelete.png"> </a>
			<? } ?>
	
		<? include "AdminUpload.php";?>

		</div>

	</form>
</body>

</html>