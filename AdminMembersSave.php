<?
    SESSION_start();
    #include "Admin_Session.php";
    include "Connect.php";

    $sql="SELECT * FROM Member;";
    $result=mysqli_query($connect,$sql);

    include "class.upload.php-master/src/class.upload.php";

    //----------------------------------------------// 

    $Name  = $_POST["MemberName"];
    $ID    = $_POST["MemberID"];
    $PW    = $_POST["MemberPW"];
    $Sex   = $_POST["MemberSex"];
    $Email = $_POST["MemberEmail"];
    $Role  = $_POST["MemberRole"];
    $Kakao = $_POST["MemberKakaoID"];

    //----------------------------------------------// 

    if ($_POST['Mode']=="ADD"){ 
        $sql="INSERT INTO Member (Member_Date, Member_Name, Member_ID, Member_PW, Member_Email, Member_Role, Member_Sex, Member_KaKao) VALUES (NOW(), '$Name', '$ID', '$PW', '$Email', '$Role', '$Sex', '$Kakao');";
    } 
    else if ($_POST['Mode']=="EDIT"){ 
        $no = $_POST['Member_No'];
        $sql="UPDATE Member SET Member_Name='$Name', Member_ID='$ID', Member_PW = '$PW', Member_Email = '$Email', Member_Sex = '$Sex' WHERE Member_No=$no;";
    } 
    else if ($_POST['Mode']=="DEL"){
        $no = $_POST['Member_No'];
        $sql="DELETE FROM Member WHERE Member_No = $no;";
    }

    //----------------------------------------------// 
        
    if (mysqli_query($connect, $sql)){

    } else {
        echo "실패:" .mysqli_error($connect);
    }

    //----------------------------------------------// 

    // SESSION에 카카오 로그인 정보 저장
    if ($Kakao != ""){
        $_SESSION['User_No']   = $row['Member_No'];
        $_SESSION['User_ID']   = $Kakao;
        $_SESSION['User_Name'] = $Kakao;
    }
    
    //----------------------------------------------// 

    if (isset($_POST["UserMemberAdd"])){
        echo "<script type=\"text/javascript\"> location.href='index.php'; </script>";
    } else {
        echo "<script type=\"text/javascript\"> location.href='AdminMembers.php'; </script>";
    }

    //----------------------------------------------// 
    
?>