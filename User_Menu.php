
	<div class = "NaviBarBG"> </div>
	<div class = "NaviBar">
		<a class = "iconBack" onclick="history.back()" <?=($_SERVER['PHP_SELF']=="/index.php")?"style=\"visibility:hidden\"":""?>> <img src = "./asset/images/iconBack.svg"> </a>
		<a class = "Title" href = "./index.php"> Thanks for Coming </a>
		<a class = "iconMenu" onclick = "showHide()" <?=($_SERVER['PHP_SELF']=="/User_FindIDPW.php")? "style=\"display:none\"":""?>> <img src = "./asset/images/iconMenu.svg"> </a>
		<a class = "iconSearch" href = "./User_SearchPage.php" <?=($_SERVER['PHP_SELF']=="/User_FindIDPW.php")? "style=\"display:none\"":""?>> <img src = "./asset/images/iconSearch.svg"> </a>
	</div>
	

	<div class = "CategoryBar" <?=($_SERVER['PHP_SELF']=="/User_SearchPage.php")||($_SERVER['PHP_SELF']=="/User_VideoDetail.php")||($_SERVER['PHP_SELF']=="/User_FindIDPW.php")? "style=\"display:none\"":""?>>
		<ul>
			<a <?=($_SERVER['PHP_SELF']=="/index.php")? "class = \"Select\"":"class = \"NonSelect\""?> href = "./index.php"> New </a>
			<!-- <a <?=($_SERVER['PHP_SELF']=="/User_New.php")? "class = \"Select\"":"class = \"NonSelect\""?> href = "./User_New.php"> NEW </a> -->
			<a <?=($_SERVER['PHP_SELF']=="/User_YoutubeUnivList.php")||($_SERVER['PHP_SELF']=="/User_YoutubeUniv.php")? "class = \"Select\"":"class = \"NonSelect\""?> href = "./User_YoutubeUnivList.php"> Playlist </a>
			<a <?=($_SERVER['PHP_SELF']=="/User_YoutubeMZ.php")? "class = \"Select\"":"class = \"NonSelect\""?> href = "./User_YoutubeMZ.php"> All Music </a>
			<a <?=($_SERVER['PHP_SELF']=="/User_InstaNunCo.php")? "class = \"Select\"":"class = \"NonSelect\""?> href = "./User_InstaNunCo.php"> Trend Info </a>
			<a <?=($_SERVER['PHP_SELF']=="/User_Question.php")? "class = \"Select\"":"class = \"NonSelect\""?> href = "./User_Question.php"> Q&A </a>
		</ul>
	</div> 
	
	<div class = "MenuBlackBG" id = "MenuBlackBG"> </div>
	<div class = "MenuBox" id = "MenuBox">
		<div class = "CloseIcon" onclick = showHide();>
			<img src = "./asset/images/iconClose.png" >
		</div>
		<a class = "TopLogin" href="./User_Login.php">
			<div class = "NunchImg"> 
				<img src = "./asset/images/nunch.png">
			</div>
			<div class = "Login">
				<span class = "Text" <?=($_SESSION['User_Name']!='')?"style=\"display:block\"":"style=\"display:none\""?>> "<?=$_SESSION['User_Name']?>"님, 환영합니다! </span>
				<span class = "Text" <?=($_SESSION['User_Name']=='')?"style=\"display:block\"":"style=\"display:none\""?>> Login is required </span>
			</div>
		</a>
		<div class = "TopLine"> </div>
		<div class = "SelectPage">
			<!-- <span class = "Text"> About 너 때는 말이야 </span>  -->
			<span class = "Text"> Recently Viewed </span> 
			<span class = "Text"> My Favorite </span> 
			<a class = "Text" link rel="stylesheet" type="text/css" href="https://www.youtube.com/channel/UChdiP_6gHHG2OIINgIf_LGw"> 
				<img src = "./asset/images/youtube_icon.png">
				Go Youtube
			</a>
			<a class = "Text" link rel="stylesheet" type="text/css" href="https://www.instagram.com/dding_ji_k/"> 
				<img src = "./asset/images/insta_icon.png">
				Go Instagram
			</a>
		</div>

		<a class = "User_Logout" onclick = "LogOut()" <?=($_SESSION['User_Name']!='')?"style=\"display:block\"":"style=\"display:none\""?>> 로그아웃하기 </a>
	</div>

	<script type="text/javascript">
		function showHide(){
	        if(document.getElementById("MenuBlackBG").style.display == 'none') {
	            document.getElementById("MenuBlackBG").style.display = 'block';
	            document.getElementById("MenuBox").style.display     = 'block';
	        }
	        else {
	            document.getElementById("MenuBlackBG").style.display = 'none';
	            document.getElementById("MenuBox").style.display     = 'none';
	        }
	    }

	    function LogOut() {
		    location.href='User_LogOut.php';
		}
	</script>

</body>

</html>