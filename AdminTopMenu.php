<? 
	isset ($_GET['Search'])==false ? $Search="" : $Search=$_GET['Search'];
?>
<form action="" method="get" name = "SearchPage">	
	<div class = "TopMenu">
		<div class = "Title">
			<span class = "blue"> Thanks for </span>
			<span class = "white"> Coming </span>
			<span class = "gray"> Administration </span>
		</div>

		<a class = "Search" onclick = "SearchBtn()"> <span> 검색 </span> </a>

	    <input type = "text" class = "ID" name = "Search" placeholder = "내용을 입력하세요" value="<?=$Search?>" onKeypress="javascript:if(event.keyCode==13) {SearchBtn()}" autocomplete="off">

	    <select id = "Pick" class = "Member">
	        <option value = "AdminMembers.php"      <?=($_SERVER['PHP_SELF']=="/AdminMembers.php")? "selected":""?>>      전체 회원    </option>
	        <option value = "AdminMainContents.php" <?=($_SERVER['PHP_SELF']=="/AdminMainContents.php")? "selected":""?>> 전체 게시글  </option>
	        <option value = "AdminMajorSeries.php"  <?=($_SERVER['PHP_SELF']=="/AdminMajorSeries.php")? "selected":""?>>  Playlist </option>
	        <option value = "AdminMZSeries.php"     <?=($_SERVER['PHP_SELF']=="/AdminMZSeries.php")? "selected":""?>>     Trend Info     </option>
	    </select>
	</div>
</form>

<script type = "text/javascript">
	function SearchBtn(){
		var Pick = $("#Pick option:selected").val();

		$('form').attr('action', Pick);
		document.SearchPage.submit();
	}
</script>