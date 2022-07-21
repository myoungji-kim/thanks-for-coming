	<div class = "SideMenu">
		<a class = "BtnUpload" href = "./AdminInstaUpload.php">
			<span class = "Text"> 게시글 업로드 </span>
		</a>
		<table class = "Menu">
			<tr>
				<td class = "Block_Hello">
					<span> "<?=$_SESSION['User_Name']?>"님, 환영합니다! </span>
				</td>
				<td class = "Block" >
						<span class = "Category"> 회원 관리 </span>
						<a href ="AdminMembers.php" <?=($_SERVER['PHP_SELF']=="/AdminMembers.php")? "class = \"Name Select\"":"class = \"Name NonSelect\""?>> 전체 회원 </a>
						<a href ="AdminMembersManager.php" <?=($_SERVER['PHP_SELF']=="/AdminMembersManager.php")? "class = \"Name Select\"":"class = \"Name NonSelect\""?>> 관리/운영자 </a>
				</td>
				<td class = "Block">
						<span class = "Category"> 콘텐츠 관리 </span>
						<!-- <a id = "Main" href ="AdminMainContents.php" <?=($_SERVER['PHP_SELF']=="/AdminMainContents.php")? "class = \"Name Select\"":"class = \"Name NonSelect\""?>> Main Page </a> -->
						<a id = "Major" href ="AdminMajorSeries.php" <?=($_SERVER['PHP_SELF']=="/AdminMajorSeries.php")? "class = \"Name Select\"":"class = \"Name NonSelect\""?>> Playlist </a>
						<a id = "MZ"  href ="AdminMZSeries.php"<?=($_SERVER['PHP_SELF']=="/AdminMZSeries.php")?"class = \"Name Select\"":"class = \"Name NonSelect\""?>> Trend Info </a>
						<!-- <a class = "Name NonSelect" > Keyword </a> -->
				</td>
				<td class = "Block">
					<span class = "Category"> 인사이트 분석 </span>
					<a href ="AdminDayofTheWeek.php" <?=($_SERVER['PHP_SELF']=="/AdminDayofTheWeek.php")?"class = \"Name Select\"":"class = \"Name NonSelect\""?>> 일간 현황 </a>
					<a href ="AdminHitRank.php"<?=($_SERVER['PHP_SELF']=="/AdminHitRank.php" OR $_SERVER['PHP_SELF']=="/AdminVisitHistory.php")?"class = \"Name Select\"":"class = \"Name NonSelect\""?>> 조회수 순위 </a>
				</td>
				<td class = "Block">
					<a class = "Category" onclick = "LogOut()"> 로그아웃 하기 </a>
				</td>
			</tr>
		</table>
	</div>
	<script type="text/javascript">
		function LogOut() {
		    location.href='AdminLogOut.php';
		}
	</script>
	