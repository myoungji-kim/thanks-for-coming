<? include "User_Session.php";?>
<? include "header.php";?>
<? include "Connect.php";?>


	<?
		$User_Name  = $_POST["InputName"] ;
		$User_Email = $_POST["InputEmail"];

		echo ($User_Name);
		echo ($User_Email);

		$sql="SELECT Member_ID FROM Member WHERE Member_Name = '$User_Name' and Member_Email = '$User_Email'";

		echo $sql;

	    $result=mysqli_query($connect,$sql);
	    $row=mysqli_fetch_assoc($result)
	?>

	<div class = "NaviBarBG"> </div>
	<div class = "NaviBar">
		<a class = "iconBack" onclick="history.back()"> <img src = "./asset/images/iconBack.svg"> </a>
		<a class = "Title" href = "./index.php"> 아이디/비밀번호 안내  </a>
		<?=$row['Member_ID'];?>
	</div>


</body>
</html>