<? include "Admin_Session.php";?>
<? include "header.php";?>

<body>
	<?   
        include "Connect.php";

        $SET_LIST_SIZE = 4; // 한 페이지 당 보여줄 게시글 수

        isset($_GET["Search"]) == false ? $SearchWord = "" : $SearchWord=$_GET["Search"] ;

        $sql="SELECT COUNT(*) FROM Insta WHERE Insta_Title LIKE '%$SearchWord%' or Insta_Text LIKE '%$SearchWord%';";
	    $result=mysqli_query($connect,$sql);

	    if ($row=mysqli_fetch_assoc($result)){
	        $CountPost=$row['COUNT(*)']; // 총 게시글 수
	    } 

	    // 어떤 데이터를 보여줄 것인지 select 쿼리문 작성
	    if (isset($_GET["pg"])==false) $_GET["pg"] = 1;

	    $sql="SELECT * FROM Insta WHERE Insta_Title LIKE '%$SearchWord%' or Insta_Text LIKE '%$SearchWord%' ORDER BY Insta_No DESC LIMIT ".($_GET["pg"]-1)*$SET_LIST_SIZE.",".$SET_LIST_SIZE." ";

	    $result=mysqli_query($connect,$sql);
    ?>

    <? include "AdminTopMenu.php";?>

    <div class = "AdminBottom">
		<? include "AdminSideMenu.php";?>
	    <form action="InstaUpload.php" method="get" enctype="multipart/form-data">
			<div class = "AdminTable">
				<span class = "Title"> 콘텐츠 관리 > Trend Info (<?=$CountPost?>) </span>
				<table class = "Table">
					<thead class = "Top">
						<tr>
							<td class = "Upload"> No      </td>
							<td class = "States"> 게시글   </td>
							<td class = "Date"  > 업로드일 </td>
							<td class = "Likes" > 좋아요   </td>
							<td class = "Who"   > 작성자   </td>
						</tr>
					</thead>

					<? while ($row=mysqli_fetch_assoc($result)){ ?>
						<tr class = Rows>
								<td class = States>
									<span class = Text ><?=$row['Insta_No']?></span>
								</td>
								<td class = Posting>
									<div class = Image>
										<img src="upload/<?=$row['Insta_Image_1']?>"
										 style = "width:140px; height: 140px; object-fit:cover;">
									</div>
									<div class = BodyText >
										<a class = BodyTitle href="AdminInstaUpload.php?no=<?=$row['Insta_No']?>"><?=$row['Insta_Title']?></a>
										<span class = MainText><?=$row['Insta_Text']?></span>
									</div>
								</td>
								<td class = Date>
									<span class = Text> <? echo date("Y-m-d",strtotime ($row['Insta_Date'])); ?> </span>
								</td>
								<td class = Likes>
									<span class = Text> 412 </span>
								</td>
								<td class = "Role">
									<span class = "Text"> <?=$row['Insta_Writer']?> </span>
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
						$pagego->pagelink($SET_LIST_SIZE, 10, $_GET["pg"], $CountPost ,"AdminMZSeries.php", "pg", $PRM_2);
					?>
				</div>
			</div>
		</form>
	</div>
</body>
</html>