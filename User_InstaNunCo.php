<? include "User_Session.php";?>
<? include "header.php";?>
<? include "Connect.php";?>
<? include "User_Menu.php";?>

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
				</div>
			</div>
		<? } ?>
	</div>

</body>
</html>