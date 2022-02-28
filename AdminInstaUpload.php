<? include "Admin_Session.php";?>
<? include "header.php";?>

<body>
	<? include "Connect.php"; ?>
	<?
		$No        = "";
		$Title     = "";
		$Image1    = "";
		$Image2    = "";
		$Image3    = "";
		$HashTag   = "";
		$BtnUpload = "수정완료";
		$PageTitle = "인스타그램 피드 수정";
		$GET_NO    = "";
		$Mode      = "ADD";

		if (isset($_GET['no'])) { // 수정 페이지
			$sql="SELECT * FROM Insta WHERE Insta_No=".$_GET['no']."";
	        $result=mysqli_query($connect,$sql);
	        $row=mysqli_fetch_assoc($result);

	        $GET_NO  = $_GET['no'];
	        $No      = $row['Insta_No'];
			$Title   = $row['Insta_Title'];
			$Image1  = $row['Insta_Image_1'];
			$Image2  = $row['Insta_Image_2'];
			$Image3  = $row['Insta_Image_3'];
			$Image4  = $row['Insta_Image_4'];
			$Image5  = $row['Insta_Image_5'];
			$Image6  = $row['Insta_Image_6'];
			$Image7  = $row['Insta_Image_7'];
			$HashTag = $row['Insta_Text'];
			$Mode   = "EDIT";
		} else { // 최초 업로드 페이지
			$BtnUpload = "업로드";
		    $PageTitle = "인스타그램 피드 업로드";
		}
	?>

    <form action = "AdminInstaSave.php" method="post" enctype="multipart/form-data" name = "InstaSave">
		<div class = "TopMenu">
			<div class = "Title">
				<span class = "blue"> Thanks for </span>
				<span class = "white"> Coming </span>
				<span class = "gray"> Administration </span>
			</div>

			<div class = "Btn">
				<a class = "Text" onclick = "history.back();"> 취소 </a>
				<a class = "Text"> 예약 </a>
				<input type = "button" id = "InstaSave" onclick = "Insta_Save()" class = "Upload" value="<?=$BtnUpload?>">
			</div>
		</div>

		<div class = "UploadBody">
			<div class = "Category">
				<span class = "Text"> <?=$PageTitle?> </span>

				<? if (empty($_GET['no'])) { ?>
					<a class = "Icon"> <img src="./asset/images/Insta_On.png"> </a>
					<a class = "Icon" href = "AdminYoutubeUpload.php"> <img src="./asset/images/Youtube_Off.png" class = "Off"> </a>
				<? } ?>
				
				<tr> 
					<td> <input type="hidden" name="Insta_No" value="<?=$No;?>"> </td> 
					<td> <input type="hidden" name="Mode" value="<?=$Mode?>"> </td> 
				</tr>
			</div>

			<div> <!-- input file-->
				<input type = "file" name = "Image1" id = "Image1" class = "InstaInput">
				<input type = "file" name = "Image2" id = "Image2" class = "InstaInput" style = "display: none;">
				<input type = "file" name = "Image3" id = "Image3" class = "InstaInput" style = "display: none;">
				<input type = "file" name = "Image4" id = "Image4" class = "InstaInput" style = "display: none;">
				<input type = "file" name = "Image5" id = "Image5" class = "InstaInput" style = "display: none;">
				<input type = "file" name = "Image6" id = "Image6" class = "InstaInput" style = "display: none;">
				<input type = "file" name = "Image7" id = "Image7" class = "InstaInput" style = "display: none;">
				<input type = "file" name = "Image8" id = "Image8" class = "InstaInput" style = "display: none;">
				<input type = "file" name = "Image9" id = "Image9" class = "InstaInput" style = "display: none;">
				<input type = "file" name = "Image10" id = "Image10" class = "InstaInput" style = "display: none;">
			</div>

			<a class = "AddPhoto" id = "AddPhoto" onclick="Insta_Add_File()"> + 사진 추가 등록 </a>

			<? if (isset($_GET['no'])) { ?>
				<div class = "BeforeImage">
					<img src="upload/<?=$Image1?>">
					<img src="upload/<?=$Image2?>" <?=($row['Insta_Image_2']=="")? "style=\"display:none\"":""?>>
					<img src="upload/<?=$Image3?>" <?=($row['Insta_Image_3']=="")? "style=\"display:none\"":""?>>
					<img src="upload/<?=$Image4?>" <?=($row['Insta_Image_4']=="")? "style=\"display:none\"":""?>>
					<img src="upload/<?=$Image5?>" <?=($row['Insta_Image_5']=="")? "style=\"display:none\"":""?>>
					<img src="upload/<?=$Image6?>" <?=($row['Insta_Image_6']=="")? "style=\"display:none\"":""?>>
					<img src="upload/<?=$Image7?>" <?=($row['Insta_Image_7']=="")? "style=\"display:none\"":""?>>
					<img src="upload/<?=$Image8?>" <?=($row['Insta_Image_8']=="")? "style=\"display:none\"":""?>>
					<img src="upload/<?=$Image9?>" <?=($row['Insta_Image_9']=="")? "style=\"display:none\"":""?>>
					<img src="upload/<?=$Image10?>" <?=($row['Insta_Image_10']=="")? "style=\"display:none\"":""?>>
				</div>
			<? } ?>

			<input type = "text" name = "InstaTitle" class = "InstaInput" placeholder="제목을 입력하세요." value="<?=$Title;?>">
			<textarea type = "text" name = "HashTag" class = "TextBody" placeholder="해시태그를 입력하세요. (예: #프로그래밍)"><?=$HashTag;?></textarea> 
		</div>

		<? if (isset($_GET['no'])) { ?>
			<a class = "IconDelete" onclick="Insta_Remove()"> <img src = "./asset/images/IconDelete.png"> </a>
		<? } ?>
	
		<?php include "AdminUpload.php";?>
	</form>
</body>

</html>