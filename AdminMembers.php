<? include "Admin_Session.php";?>
<? include "header.php";?>

<body>
	<?   
        include "Connect.php";

        $SET_LIST_SIZE = 5;

        isset($_GET["Search"]) == false ? $SearchWord = "" : $SearchWord=$_GET["Search"] ;

        $sql="SELECT COUNT(*) FROM Member WHERE Member_ID LIKE '%$SearchWord%' or Member_Name LIKE '%$SearchWord%';";
	    $result=mysqli_query($connect,$sql);

	    if ($row=mysqli_fetch_assoc($result)){
	        $CountPost=$row['COUNT(*)'];
	    } 

	    // 어떤 데이터를 보여줄 것인지 select 쿼리문 작성
	    if (isset($_GET["pg"]) == false) $_GET["pg"]=1;

	    $sql="SELECT Member_No, Member_ID, Member_Name, Member_ID, Member_Sex, Member_Role, Member_Date, Member_Email FROM Member WHERE Member_ID LIKE '%$SearchWord%' or Member_Name LIKE '%$SearchWord%' ORDER BY Member_No DESC LIMIT ".($_GET["pg"]-1)*$SET_LIST_SIZE.",".$SET_LIST_SIZE." ";

	    $result=mysqli_query($connect,$sql);
    ?>
	<? include "AdminTopMenu.php";?>

	<div class = "AdminBottom">
		<? include "AdminSideMenu.php";?>
	    <form action = "MembersSave.php" method="post" enctype="multipart/form-data" name="MembersSave">
			<div class = "AdminTable">
				<span class = "Title"> 전체 멤버 (<?=$CountPost?>) </span>
				<table class = "Table">
					<thead class = "Top">
						<tr>
							<td class = "Upload">    No           </td>
							<td class = "Name">      이름/아이디   </td>
							<td class = "Sex">       성별         </td>
							<td class = "JoinDate">  가입일       </td>
							<td class = "Email">     이메일 주소  </td>
							<td class = "Role">      구분         </td>
						</tr>
					</thead>
					<? while ($row=mysqli_fetch_assoc($result)){ ?>
					<tr id = "Rows">
							<td class = "MemberNo"> <?=$row['Member_No'];?> </td>
							<td class = "BodyText"> 
								<a class = "BodyTitle" href="AdminMembersUpload.php?no=<?=$row['Member_No']?>"> <?=$row['Member_Name'];?> </a>
								<span class = "MainText"> <?=$row['Member_ID'];?> </span> 
							</td>
							<td class = "Sex"> <span class = "Text"> <?=$row['Member_Sex'];?> </span> </td>
							<td class = "JoinDate"> <span class = "Text"> <?= date("Y-m-d",strtotime ($row['Member_Date'])); ?> </span> </td>
							<td class = "Email"> <span class = "Text"> <?=$row['Member_Email'];?> </span> </td>
							<td class = "Role"> <span class = "Text"> <?=$row['Member_Role'];?> </span> </td>
					</tr>
					<? } ?>
				</table>
				<?php include "ClassPaging.php";?>

				<!-- 개별 페이징 -->
				<div class="PagingContainer">
					<?
						isset($_GET["Search"]) == false ? $PRM_2 = NULL : $PRM_2= "Search=" ;

						$pagego= new paging;
						$pagego->pagelink($SET_LIST_SIZE, 10, $_GET["pg"], $CountPost ,"AdminMembers.php", "pg", $PRM_2);
					?>
				</div>
			</div>
			<a class = "IconDelete" href = "./AdminMembersUpload.php"> <img src = "./asset/images/IconPlus.png"> </a>
		</form>
	</div>
</body>


</html>