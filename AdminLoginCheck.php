<?
    SESSION_start();
	header('Content-Type: text/html; charset=UTF-8'); //한글
    include "Connect.php";

    //--------- SNS 로그인
    if ($_POST['UserKakao'] != ""){
        $KakaoID = $_POST['UserKakao'];

        $sql="SELECT Member_No, Member_Kakao FROM Member WHERE Member_Kakao='$KakaoID'";
        $result=mysqli_query($connect,$sql);
        
        if ($row=mysqli_fetch_assoc($result)){
        // LOGIN
            $Input_ID = $_POST['InputID'];
            $UserName = $KakaoID;
        } else {
        // INSERT
            ?>
            <form action = "User_Join.php" name = "JoinKakao" method = "post" enctype = "multipart/form-data">
                <input type = "hidden" name = "MemberKakaoID" value = "<?=$KakaoID?>">
            </form>
            <?
            echo "<script type=\"text/javascript\"> document.JoinKakao.submit(); </script>";
        }
    }
    else 
    {
        //--------- 일반 로그인
        $Input_ID = $_POST['InputID'];
        $Input_PW = $_POST['InputPW'];

        if (isset($_POST['UserMode'])){
            $UserMode="사용자";  
        } else {
            $UserMode="관리자";
        }

        $sql="SELECT * FROM Member WHERE Member_ID = '$Input_ID' AND Member_PW = '$Input_PW'";
        $result=mysqli_query($connect,$sql);
        $row=mysqli_fetch_assoc($result);

        if (isset($row['Member_ID']) && $row['Member_Role']!=$UserMode && !isset($_POST['UserKakao'])){
            echo "<script type=\"text/javascript\"> alert('다시 입력해주세요.'); history.back(); </script>";
            exit();
        }
        else if (!isset($row['Member_ID']) && !isset($_POST['UserKakao'])){
            echo "<script type=\"text/javascript\"> alert('아이디 또는 패스워드가 잘못되었습니다.'); history.back(); </script>";
            exit();
        }
        $UserName = $row['Member_Name'];
    }

    // SESSION에 로그인 정보 저장
    $_SESSION['User_No']   = $row['Member_No'];
    $_SESSION['User_ID']   = $Input_ID;
    $_SESSION['User_Name'] = $UserName;
    
    if (isset($_POST['UserMode'])){
        echo "<script type=\"text/javascript\"> location.href='index.php'; </script>";    
    } else {
        echo "<script type=\"text/javascript\"> location.href='AdminMembers.php'; </script>";  
    }
?>
