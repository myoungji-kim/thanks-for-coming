<? include "User_Session.php";?>
<? include "header.php";?>
<? include "Connect.php";?>
<? include "User_Menu.php";?>

	<?
		$SearchWord = isset($_GET["Search"]) == false ? "" : $_GET["Search"];

		$sql="SELECT * FROM Youtube WHERE Youtube_Title LIKE '%$SearchWord%' or Youtube_Text LIKE '%$SearchWord%'";
        $result=mysqli_query($connect,$sql);
	?>

	<ul class = "MainTable">
			<? while ($row=mysqli_fetch_assoc($result)){ ?>
				<li class = "Column">
					<a class = "PostMargin" href="User_VideoDetail.php?no=<?=$row['Youtube_No']?>">
						<div class = "PostBox">
							<div class = "CoverImage">
								<div class = "IconImage">
									<img src = "./asset/images/iconImage.svg">
								</div>
								<img src="upload/<?=$row['Youtube_Thumbnail']?>">
							</div>
							<div class = "CoverTitle">
								<span class = "Text"> <?=$row['Youtube_Title']?> </span>
							</div>
						</div>
					</a>
				</li>
			<? } ?>

	<?
		$sql="SELECT * FROM Insta WHERE Insta_Title LIKE '%$SearchWord%' or Insta_Text LIKE '%$SearchWord%'";
        $result=mysqli_query($connect,$sql);
	?>
	<? while ($row=mysqli_fetch_assoc($result)){ ?>
		<li class = "Column">
			<a class = "PostMargin" href="User_InstaNunCo.php?no=<?=$row['Insta_No']?>">
				<div class = "PostBox">
					<div class = "CoverImage">
						<div class = "IconImage">
							<img src = "./asset/images/iconImage.svg">
						</div>
						<img src="upload/<?=$row['Insta_Image_1']?>">
					</div>
					<div class = "CoverTitle">
						<span class = "Text"> <?=$row['Insta_Title']?> </span>
					</div>
				</div>
			</a>
		</li>
	<? } ?>
	</ul>

</body>
</html>