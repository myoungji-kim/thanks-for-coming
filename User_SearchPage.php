<? include "User_Session.php";?>
<? include "header.php";?>
<? include "Connect.php";?>
<? include "User_Menu.php";?>

<form action="User_SearchResult.php" method="get" name = "SearchPage">
	<div class = "SearchPage" id = "SearchPage">
		<div class = "SearchTitle">
			<span class = "Text"> 무엇을 </span>
			<span class = "Text"> 검색하시겠어요? </span>
		</div>

		<div class = "SearchBar">
			<div class = "LineBox">
				<input type = "text" class = "Text" name = "Search" placeholder="검색어를 입력하세요" value="<?=$Search?>">
				<a class = "IconSearch" onclick = "SearchBtn()"> <img src = "./asset/images/iconSearch_2.svg"></a>
			</div>
		</div>
		<div class = "RecommendBox">
			<div class = "TextBox"> <span class = "Text"> 추천 검색어 </span> </div>
			<a class = "RoundRect"> 
				<span class = "Text"> Kim Myoung Ji </span>
			</a>
		</div>
	</div>
</form>

<script type = "text/javascript">
	function SearchBtn(){
		document.SearchPage.submit();
	}
</script>

</body>

</html>