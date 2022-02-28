<? include "Admin_Session.php";?>
<? include "header.php";?>
	<?   
        include "Connect.php";

        if ($_GET["t_fromDate"] == "" && $_GET["t_toDate"] == "") {
        	$Term = "";
        } else {
        	$fromDate = $_GET["t_fromDate"];
        	$toDate   = $_GET["t_toDate"];
        	$Term ="WHERE Visit_Date between date($fromDate) and date($toDate+1)";
        }

        $sql="SELECT COUNT(*) as AllCount FROM HitRank ".$Term." ;";
		$result=mysqli_query($connect,$sql);

		if ($row=mysqli_fetch_assoc($result)){
			$AllCount = $row['AllCount'];
		}

		$sql="SELECT 
				(SELECT Max(Visit_Date) FROM HitRank WHERE Member_No=M.Member_No) AS Recent_Visit,
				M.Member_Name, M.Member_No, COUNT(H.Member_No) AS Count_Visit
			FROM Member AS M
			LEFT JOIN HitRank AS H ON H.Member_No = M.Member_No
			 ".$Term." 
			GROUP BY M.Member_Name, M.Member_No
			ORDER BY Count_Visit DESC;";
		$result=mysqli_query($connect,$sql);
    ?>
   
    <? include "AdminTopMenu.php";?>
    <div class = "AdminBottom">
		<? include "AdminSideMenu.php";?>
	    <form action="/AdminHitRank.php" method="get" enctype="multipart/form-data" name = "SerachHitRank">
			<div class = "AdminTable">
				<span class = "Title"> 누적 조회수 (<?=$AllCount?>) </span>
				<div class = "InputDate">
					<input type = "text" id = "fromDate" class = "Date" placeholder="시작일" name = "t_fromDate" value="<?=$fromDate?>" autocomplete="off">
					<span> ~ </span>
					<input type = "text" id = "toDate" class = "Date" placeholder="종료일" name = "t_toDate" value="<?=$toDate?>" autocomplete="off">
					<a class = "DateSearch" onclick = "SearchHit()"> <span> 조회 </span> </a>
				</div>
				<table class = "Table">
					<thead class = "Top">
						<tr>
							<td class = "Category"> 회원명 </td>
							<td class = "PostTitle"> 회원번호 </td>
							<td class = "Views"> 조회수 </td>
							<td class = "RecentVisit"> 최근 방문일 </td>
						</tr>
					</thead>
					<? while ($row=mysqli_fetch_assoc($result)){ ?>
						<tr id = "Rows">
							<td class = "Category"> <a style="text-decoration: underline;" href="AdminVisitHistory.php?no=<?=$row['Member_No']?>&name=<?=$row['Member_Name']?>"> <?=$row['Member_Name'];?> <a> </td>
							<td class = "PostName"> <?=$row['Member_No'];?> </td>
							<td class = "Views"> <div style = "width:<?=$row['Count_Visit']+2;?>%; height:40px; background: #666666; float: left; padding: 13px 0px 0px 10px; color:white;"> <?=$row['Count_Visit'];?> </div> </td>
							<td class = "RecentVisit"> <?= date("Y-m-d",strtotime ($row['Recent_Visit'])); ?></td>

						</tr>
					<? } ?>
				</table>
		</form>
	</div>
</body>
</html>