<? include "User_Session.php";?>
<? include "header.php";?>
<? include "Connect.php";?>
<? include "User_Menu.php";?>

	<?
		$sql="SELECT * FROM Youtube WHERE Youtube_No ORDER BY Youtube_No desc limit 8";
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
	</ul>

</body>
</html>