<? include "Admin_Session.php";?>
<? include "header.php";?>
	<?   
        include "Connect.php";

        $UserNum  = $_GET['no'];
        $UserName = $_GET['name'];

        if ($_GET["t_fromDate"] == "" && $_GET["t_toDate"] == "") {
        	$Term = "";
        	$SearchTerm = "";
        } else {
        	$fromDate = $_GET["t_fromDate"];
        	$toDate   = $_GET["t_toDate"];
        	$Term = "Visit_Date between date($fromDate) and date($toDate+1) AND ";
        	$SearchTerm = " ($fromDate)~($toDate)";
        }

        $sql="SELECT COUNT(Visit_Page) as AllCount FROM HitRank WHERE ".$Term."Member_No = '".$UserNum."';";
		$result=mysqli_query($connect,$sql);

		if($row=mysqli_fetch_assoc($result)){
			$AllCount = $row['AllCount'];
		}

		$sql="SELECT Visit_Page as VisitCategory, Visit_Date, COUNT(Visit_Page) as CountVisit FROM HitRank WHERE ".$Term."Member_No = '".$UserNum."' GROUP BY VisitCategory ORDER BY CountVisit DESC;";
		$result=mysqli_query($connect,$sql);
    ?>

    <? include "AdminTopMenu.php";?>
    
    <div class = "AdminBottom">
		<? include "AdminSideMenu.php";?>
	    <form action="/AdminVisitHistory.php" method="get" enctype="multipart/form-data" name = "SerachVisitHistory">
	    	<tr> 
				<td> <input type="hidden" name="name" value="<?=$UserNum;?>"> </td>
			</tr>
			<div class = "AdminTable">
				<span class = "Title"> '<?=$UserName?>' 님의 방문정보 <?=$SearchTerm?> </span>
				<div class = "InputDate">
					<input type = "text" id = "fromDate" class = "Date" placeholder="시작일" name = "t_fromDate" value="<?=$fromDate?>" autocomplete="off">
					<span> ~ </span>
					<input type = "text" id = "toDate" class = "Date" placeholder="종료일" name = "t_toDate" value="<?=$toDate?>" autocomplete="off">
					<a class = "DateSearch" onclick = "SearchHit()"> <span> 조회 </span> </a>
				</div>

				<table class = "Table">
					<thead class = "Top">
						<tr>
							<td class = "Category"> 카테고리 </td>
							<!-- <td class = "PostTitle"> 게시글 제목 </td> -->
							<td class = "Views"> 조회수 </td>
						</tr>
					</thead>
					<? while ($row=mysqli_fetch_assoc($result)){ ?>
						<tr id = "Rows">
							<td class = "Category"> <?=$row['VisitCategory'];?> </td>
							<!-- <td class = "PostName"> (NULL) </td> --> 
							<td class = "Views"> <div style = "width:<?=round(($row['CountVisit']/$AllCount)*100);?>%; height:40px; background: #666666; float: left; padding: 13px 0px 0px 10px; color:white;"> <?=$row['CountVisit'];?></div> </td>
						</tr>
					<? } ?>
				</table>
		</form>
	</div>
	<script type ="text/javascript">
		$.datepicker.setDefaults({
	        dateFormat: 'yymmdd',
	        prevText: '이전 달',
	        nextText: '다음 달',
	        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
	        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
	        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
	        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
	        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
	        showMonthAfterYear: true,
	        yearSuffix: '년'
	    });

		$(function() {
		    $("#fromDate").datepicker();
		    $("#toDate").datepicker();
		} );

	function SearchHit(){
		if ($("#fromDate").val()=="" && $("#toDate").val()!="") {
			alert("시작일을 선택해주세요");
		} else if ($("#fromDate").val()!="" && $("#toDate").val()=="") {
			alert("종료일을 선택해주세요");
		}
		document.SerachVisitHistory.submit();
	}

	</script>
	</body>
</html>