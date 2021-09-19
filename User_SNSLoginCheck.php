<?
    SESSION_start();
    header('Content-Type: text/html; charset=UTF-8'); //한글
    include "Connect.php";

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

    if (isset($row['Member_ID']) && $row['Member_Role']!=$UserMode){
        echo "<script type=\"text/javascript\"> alert('꾸에에에엑'); history.back(); </script>";
        exit();
    }
    else if (!isset($row['Member_ID']) && !isset($_POST['UserKakao'])){
        echo "<script type=\"text/javascript\"> alert('아이디 또는 패스워드가 잘못되었습니다.'); history.back(); </script>";
        exit();
    } 
  
    $_SESSION['User_ID']  = $Input_ID;
    $_SESSION['User_Name']= $row['Member_Name'];

    if (isset($_POST['UserMode'])){
        // echo "<script type=\"text/javascript\"> location.href='index.php'; </script>";    
    } else {
        echo "<script type=\"text/javascript\"> location.href='AdminMembers.php'; </script>";  
    }
?>