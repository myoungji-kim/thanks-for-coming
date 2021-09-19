<? include "Admin_Session.php";?>
<? include "header.php";?>

	<?   
        include "Connect.php";

        if ($_GET["t_fromDate"] == "" && $_GET["t_toDate"] == "") {
        	$Term = "";
        	$DateTerm = "(전체)";
        } else {
        	$fromDate = $_GET["t_fromDate"];
        	$toDate   = $_GET["t_toDate"];
        	$Term ="WHERE Visit_Date between date($fromDate) and date($toDate+1)";
        	$DateTerm = "(".$fromDate.")~(".$toDate.")";
        }

		$sql="SELECT COUNT(Visit_Date) as CountDay, DAYOFWEEK(Visit_Date) as test FROM HitRank ".$Term." GROUP BY DAYOFWEEK(Visit_Date);";
		$result=mysqli_query($connect,$sql);
    ?>

    <? include "AdminTopMenu.php";?>
    
    <div class = "AdminBottom">
		<? include "AdminSideMenu.php";?>
	    <form action="/AdminDayofTheWeek.php" method="get" enctype="multipart/form-data" name = "SerachHitRank">
	    	<tr> 
				<td> <input type="hidden" name="name" value="<?=$UserNum;?>"> </td>
			</tr>
			<div class = "AdminTable">
				<span class = "Title"> 요일별 조회수 통계 <?=$DateTerm?> </span>
				<div class = "InputDate">
					<input type = "text" id = "fromDate" class = "Date" placeholder="시작일" name = "t_fromDate" value="<?=$fromDate?>" autocomplete="off">
					<span> ~ </span>
					<input type = "text" id = "toDate" class = "Date" placeholder="종료일" name = "t_toDate" value="<?=$toDate?>" autocomplete="off">
					<a class = "DateSearch" onclick = "SearchHit()"> <span> 조회 </span> </a>
				</div>
				<div class = "DayGraphTable">
					<div class = "aGraph">
						<? $row = mysqli_fetch_assoc($result); ?>
							<? for($i=1; $i<=7; $i++) {
								if ($i == $row['test']) { ?>
									<div class = "BarBox"> 
										<span class = "Num" style ="bottom:<?=$row['CountDay']+1;?>%"> <?=$row['CountDay'];?> </span>
										<div class="aBar" style ="height: <?=$row['CountDay'];?>%;"> </div> 
									</div> 
								<? $row = mysqli_fetch_assoc($result); 
								} else { ?>
									<div class = "BarBox"> 
										<span class = "Num" style ="bottom:5px"> 0 </span> 
										<div class = "aBar" style ="height: 1px;"> </div>
									</div> 
								<? } 
							} ?>
					</div>
					<div class = "DayName">
						<div class = "BarBox"> <span> 일 </span> </div>
						<div class = "BarBox"> <span> 월 </span> </div>
						<div class = "BarBox"> <span> 화 </span> </div>
						<div class = "BarBox"> <span> 수 </span> </div>
						<div class = "BarBox"> <span> 목 </span> </div>
						<div class = "BarBox"> <span> 금 </span> </div>
						<div class = "BarBox"> <span> 토 </span> </div>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>