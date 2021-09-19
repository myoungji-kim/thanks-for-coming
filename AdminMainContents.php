<? include "Admin_Session.php";?>
<? include "header.php";?>

<body>
	<?php include "AdminTopMenu.php";?>
	<?php include "AdminSideMenu.php";?>

	<?php   
        include "Connect.php";
    
        $sql="SELECT * FROM Insta, Youtube order by Insta_No, Youtube_No desc;";
        $result=mysqli_query($connect,$sql);

        
    ?>

    <form action="InstaEdit.php" method="post" enctype="multipart/form-data">
		<div class = "AdminTable">
			<span class = "Title"> 콘텐츠 관리 > 메인페이지 </span>
			<table class = "Table">
				<thead>
					<tr class = "Top">
						<td class = "Upload"> No      </td>
						<td class = "States"> 게시글   </td>
						<td class = "Date">   업로드일 </td>
						<td class = "Likes">  좋아요   </td>
						<td class = "Who">  선택     </td>
					</tr>
				</thead>
			</table>
			<a class = "IconDelete"> <img src = "./asset/images/IconDelete.png"> </a>
		</div>
	</form>
	<?php include "Admin_Javascript.php";?>
</body>


</html>