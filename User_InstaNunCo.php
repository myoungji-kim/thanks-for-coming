<? include "User_Session.php";?>
<? include "header.php";?>
<? include "Connect.php";?>
<? include "User_Menu.php";?>

	<div class = "HashTag">
		<ul>
			<a class = "Select">  <span class = "MintText"> #여기서 </span> </a>
			<a class = "NonSelect"> <span class = "GrayText"> #인스타 </span> </a>
			<a class = "NonSelect"> <span class = "GrayText"> #사진을 </span> </a>
			<a class = "NonSelect"> <span class = "GrayText"> #볼 수 </span> </a>
			<a class = "NonSelect"> <span class = "GrayText"> #있어요 </span> </a>
			<a class = "NonSelect"> <span class = "GrayText"> (●'◡'●) </span> </a>
		</ul>
	</div>

	<?
		$sql="SELECT * FROM Insta WHERE Insta_No";
        $result=mysqli_query($connect,$sql);
	?>

	<div class = "Insta">
		<? while ($row=mysqli_fetch_assoc($result)){ ?>
			<div class = "CardNews">
				<div class = "Photo">
					<img src="upload/<?=$row['Insta_Image_1']?>">
					<img src="upload/<?=$row['Insta_Image_2']?>" <?=($row['Insta_Image_2']=="")? "style=\"display:none\"":""?>>
					<img src="upload/<?=$row['Insta_Image_3']?>" <?=($row['Insta_Image_3']=="")? "style=\"display:none\"":""?>>
					<img src="upload/<?=$row['Insta_Image_4']?>" <?=($row['Insta_Image_4']=="")? "style=\"display:none\"":""?>>
					<img src="upload/<?=$row['Insta_Image_5']?>" <?=($row['Insta_Image_5']=="")? "style=\"display:none\"":""?>>
					<img src="upload/<?=$row['Insta_Image_6']?>" <?=($row['Insta_Image_6']=="")? "style=\"display:none\"":""?>>
					<img src="upload/<?=$row['Insta_Image_7']?>" <?=($row['Insta_Image_7']=="")? "style=\"display:none\"":""?>>
				</div>
				<div class = "TextBox">
					<div class = "LeftBox"> 
						<span class = "TagText"> <?=$row['Insta_Text']?> </span>
					</div>
					<div class = "RightBox"> 
						<div class = "IconHeart"> <img src = "./asset/images/IconHeart.svg"> </div>
						<div class = "IconShare"> <img src = "./asset/images/IconShare.svg"> </div>
					</div>
				</div>
			</div>
		<? } ?>
	</div>

</body>
</html>