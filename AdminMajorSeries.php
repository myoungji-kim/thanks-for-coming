<? include "Admin_Session.php";?>
<? include "header.php";?>
	<?  
        include "Connect.php";

        $SET_LIST_SIZE = 4;
        $SearchWord = isset($_GET["Search"]) == false ? "" : $_GET["Search"];

        $sql="SELECT COUNT(*) FROM Youtube WHERE Youtube_Title LIKE '%$SearchWord%' or Youtube_Text LIKE '%$SearchWord%';";
	    $result=mysqli_query($connect,$sql);

	    if ($row=mysqli_fetch_assoc($result)){
	        $CountPost=$row['COUNT(*)'];
	    } 

	    // 어떤 데이터를 보여줄 것인지 select 쿼리문 작성
	    if (isset($_GET["pg"])==false) $_GET["pg"] = 1;

	    $sql="SELECT * FROM Youtube WHERE Youtube_Title LIKE '%$SearchWord%' or Youtube_Text LIKE '%$SearchWord%' ORDER BY Youtube_No DESC LIMIT ".($_GET["pg"]-1)*$SET_LIST_SIZE.",".$SET_LIST_SIZE." ";

	    $result=mysqli_query($connect,$sql);
    ?>
   
    <? include "AdminTopMenu.php";?>

    <div class = "AdminBottom">
		<? include "AdminSideMenu.php";?>

	    <form action="YoutubeEdit.php" method="post" enctype="multipart/form-data">
			<div class = "AdminTable">
				<span class = "Title"> 콘텐츠 관리 > Playlist (<?=$CountPost?>) </span>
				<table class = "Table">
					<thead>
						<tr class = "Top">
							<td class = "Upload"> No       </td>
							<td class = "States"> 게시글    </td>
							<td class = "Date"  > 업로드일  </td>
							<td class = "Likes" > 재생목록  </td>
							<td class = "Who"   > 작성자    </td>
						</tr>
					</thead>
					<? while ($row=mysqli_fetch_assoc($result)){ ?>
						<tr class = Rows>
								<td class = States>
									<span class = Text><?=$row['Youtube_No']?></span>
								</td>
								<td class = Posting>
									<div class = Image>
										<img src="upload/<?=$row['Youtube_Thumbnail']?>"
										 class = Youtube style="width: 140px; height: 140px; object-fit:cover;">
									</div>
									<div class = BodyText >
										<a class = BodyTitle href="AdminYoutubeUpload.php?no=<?=$row['Youtube_No']?>"><?=$row['Youtube_Title']?></a>
										<span class = MainText><?=$row['Youtube_SubTitle']?></span>
									</div>
								</td>	
								<td class = Date>
									<span class = Text> <? echo date("Y-m-d",strtotime ($row['Youtube_Date'])); ?> </span>
								</td>
								<td class = Likes>
									<span class = Text><?=$row['Youtube_Playlist']?></span>
								</td>
								<td class = "Role">
									<span class = "Text"> <?=$row['Youtube_Writer']?> </span>
								</td>
						</tr>
					<? } ?>
				</table>

			<?php include "ClassPaging.php";?>

			<!-- 개별 페이징 -->
			<div class="PagingContainer">
				<?
					isset($_GET["Search"]) == false ? $PRM_2 = NULL : $PRM_2= "Search=" ;

					$pagego= new paging;
					$pagego->pagelink($SET_LIST_SIZE, 10, $_GET["pg"], $CountPost ,"AdminMajorSeries.php", "pg", $PRM_2);
				?>
			</div>
		</form>
	</div>
</body>


</html>