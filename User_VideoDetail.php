<? include "User_Session.php";?>
<? include "header.php";?>
<? include "Connect.php";?>
<? include "User_Menu.php";?>
<body>

	<?  
		$sql="SELECT * FROM Youtube WHERE Youtube_No=".$_GET['no']."";
	    $result=mysqli_query($connect,$sql);
	    $row=mysqli_fetch_assoc($result);

	    $GET_NO     = $_GET['no'];
		$No         = $row['Youtube_No'];

	    $URL        = $row['Youtube_URL'];
		$Title      = $row['Youtube_Title'];
		$SubTitle   = $row['Youtube_SubTitle'];
		$Date       = $row['Youtube_Date'];

		$Thumbnail  = $row['Youtube_Thumbnail'];
		$TextBody   = $row['Youtube_Text'];
		$Playlist   = $row['Youtube_Playlist'];
	?>

	<div class = "VideoDetail">
		<div class = "VideoBox">
			<iframe class = "Video" src="<?=$URL;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen> </iframe>
		</div>

		<div class = "VideoTitle"> 
			<div class = "LeftBox">
				<div class = "TextBox">
					<span class = "TextTag"> <?=$SubTitle?> </span>
					<span class = "Title"> <?=$Title?> </span>
					<span class = "Date"> 게시일 <?= date("Y.m.d",strtotime ($Date));?> </span>
				</div>
			</div>
			<div class = "RightBox">
				<div class = "InBox">
					<a class = "IconHeart" onclick = "ClickHeart()">
						<img id = "IconHeart" src = "./asset/images/Heart_Empty.png">
						<span class = "HeartNum"> 12 </span>
					</a>
					<div class = "IconShare">
						<img src = "./asset/images/IconShare.svg">
					</div>
				</div>
			</div>
		</div>

		<div class = "VideoCategory">
			<div class = "LeftBox" id = "LeftBox">
				<a class = "IconExplain" onclick = "ToExplain()">
					<img id = "IconExplain" src = "./asset/images/iconExplain_Color.svg">
				</a>
			</div>
			<div class = "RightBox" id = "RightBox">
				<a class = "IconRecommend" onclick = "ToRecommend()">
					<img id = "IconRecommend" src = "./asset/images/iconRecommend_Gray.svg">
				</a>
			</div>
		</div>

		<div class = "VideoExplain" id = "VideoExplain">
			<?=$TextBody?>
		</div>

		<?  
			$sql="SELECT * FROM Youtube ORDER BY rand() LIMIT 10";
		    $result=mysqli_query($connect,$sql);
		?>

		<div class = "VideoRecommend" id = "VideoRecommend">
			<? while ($row=mysqli_fetch_assoc($result)){ ?>
					<div class = "InBox">
						<a href="User_VideoDetail.php?no=<?=$row['Youtube_No']?>">
							<div class = "Video">
								<img src="upload/<?=$row['Youtube_Thumbnail']?>">
							</div>
							<span class = "Title"> <?=$row['Youtube_Title'];?> </span>
						</a>
					</div>
			<? } ?>
		</div>
	</div>

	<script type="text/javascript">
		function ClickHeart(){
			$("#IconHeart").attr('src', "./asset/images/Heart_Full.png");
		}

		function ToExplain(){
			$("#IconExplain").attr('src', "./asset/images/iconExplain_Color.svg");
	        $("#IconRecommend").attr('src', "./asset/images/iconRecommend_Gray.svg");

	        $("#VideoExplain").css({"display": "block"});
			$("#VideoRecommend").css({"display": "none"});
			
			$("#LeftBox").css({"border-bottom": "6px solid #2A74D5"});
			$("#RightBox").css({"border-bottom": "0px solid #2A74D5"});
	    }

	    function ToRecommend(){
	        $("#IconExplain").attr('src', "./asset/images/iconExplain_Gray.svg");
	        $("#IconRecommend").attr('src', "./asset/images/iconRecommend_Color.svg");

	        $("#VideoExplain").css({"display": "none"});
			$("#VideoRecommend").css({"display": "block"});

			$("#LeftBox").css({"border-bottom": "0px solid #2A74D5"});
			$("#RightBox").css({"border-bottom": "6px solid #2A74D5"});
	    }
	</script>
</body>

</html>