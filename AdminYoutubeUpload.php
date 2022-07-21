<? include "Admin_Session.php";?>
<? include "header.php";?>

<body>

	<? include "Connect.php";?>

	<?
		$No="";
		
		$URL="";
		$Title = "";
		$SubTitle = "";
		$Thumbnail = "";
		$TextBody  = "";
		$Playlist  = "";

		$BtnUpload = "수정완료";
		$PageTitle = "영상 업로드 수정";
		$GET_NO = "";
		$Mode   = "ADD";

		if (isset($_GET['no'])) { // 수정 페이지
			$sql="SELECT * FROM Youtube WHERE Youtube_No=".$_GET['no']."";
	        $result=mysqli_query($connect,$sql);
	        $row=mysqli_fetch_assoc($result);

	        $GET_NO     = $_GET['no'];
	 		$No         = $row['Youtube_No'];

	        $URL        = $row['Youtube_URL'];
			$Title      = $row['Youtube_Title'];
			$SubTitle   = $row['Youtube_SubTitle'];

			$Thumbnail  = $row['Youtube_Thumbnail'];
			$TextBody   = $row['Youtube_Text'];
			$Playlist   = $row['Youtube_Playlist'];
			$Mode       = "EDIT";

		} else { // 최초 업로드 페이지
			$BtnUpload = "업로드";
		    $PageTitle = "영상 업로드";
		}
	?>

    <form action = "AdminYoutubeSave.php" method="post" enctype="multipart/form-data" name = "YoutubeSave">

		<div class = "TopMenu">
			<div class = "Title">
				<span class = "blue">  Thanks for </span>
				<span class = "white"> Coming     </span>
				<span class = "gray">  Administration </span>
			</div>

			<div class = "Btn">
				<a class = "Text" onclick = "history.back();"> 취소 </a>
				<!-- <a class = "Text"> 예약 </a> -->
				<input type = "button" id = "YoutubeSave" onclick = "Youtube_Save()" class = "Upload" value="<?=$BtnUpload?>">
			</div>
		</div>

		<div class = "UploadBody">
			<div class = "Category">
				<span class = "Text"> <?=$PageTitle?> </span>
				<? if (isset($_GET['no'])) { ?>
					<div class = "UploadBox">
						<img src="upload/<?=$Thumbnail;?>" style="width:400px; height:400px; float: left; margin:50px 0px 0px 40px; object-fit:cover;">
						<iframe width="871" height="492" src="<?=$URL;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen> </iframe>
					</div>
				<? } ?>

				<? if (empty($_GET['no'])) { ?>
					<a class = "Icon" href = "AdminInstaUpload.php">   <img src="./asset/images/Insta_Off.png" class = "Off"> </a>
					<a class = "Icon"> <img src="./asset/images/Youtube_On.png"> </a>
				<? } ?>

				<tr> 
					<td> <input type="hidden" name="Youtube_No" value="<?=$No?>"> </td>
					<td> <input type="hidden" name="Mode" value="<?=$Mode?>"> </td>
				</tr>
			</div>

			<input type = "text" name = "URL" class = "ContentsTitle" placeholder = "URL을 입력하세요" value="<?=$URL?>">
			<input type = "file" name = "Thumbnail" class = "Playlist">

			<input type = "text" name = "Title" class = "ContentsTitle" placeholder = "제목을 입력하세요" value="<?=$Title?>">
			<select name= "Playlist" class = "Playlist">
		        <option values = 1> 카테고리를 선택해 주세요 </option>
		        <option values = 2 <?=($Playlist=="Lets_Drive")?"selected":""?>> Lets_Drive </option>
		        <option values = 3 <?=($Playlist=="Good_Morning")?"selected":""?>> Good_Morning </option>
		        <option values = 4 <?=($Playlist=="In_the_Blue")?"selected":""?>> In_the_Blue </option>
		        <option values = 5 <?=($Playlist=="Im_in_Disneyland")?"selected":""?>> Im_in_Disneyland </option>
		        <option values = 6 <?=($Playlist=="Hello_My_Memory")?"selected":""?>> Hello_My_Memory </option>
		    </select>

		    <input type = "text" name = "SubTitle" class = "ContentsTitle" placeholder = "소제목을 입력하세요" value="<?=$SubTitle?>" style = "width:100%;">

		    <textarea name = "TextBody" class = "TextBody" placeholder = "내용을 입력하세요"><?=$TextBody?></textarea>
		</div>

		<? if (isset($_GET['no'])) { ?>
			<a class = "IconDelete" onclick="Youtube_Remove()"> <img src = "./asset/images/IconDelete.png"> </a>
		<? } ?>
	
	</form>

	<?php include "AdminUpload.php";?>

</body>

</html>