<?
    include "Admin_Session.php";
    header('Content-Type: text/html; charset=UTF-8'); // 한글 보여주기
    
    include "Connect.php";
    
    $sql="SELECT * FROM Youtube;";
    $result=mysqli_query($connect,$sql);

	include "class.upload.php-master/src/class.upload.php";

    //----------------------------------------------// 

    $Thumbnail_1 = new Verot\Upload\Upload($_FILES['Thumbnail']);
    if($Thumbnail_1->uploaded) {
        $Thumbnail_1->file_overwrite = true;
        $Thumbnail_1->process($_SERVER["DOCUMENT_ROOT"]."/upload");
        if ($Thumbnail_1->processed) {
            $Thumbnail = $Thumbnail_1->file_dst_name;
            if ($_POST['Youtube_No']!=""){
                $A=", Youtube_Thumbnail='$Thumbnail'";
            }
        } else {
            echo 'error : ' .( $Thumbnail_1->error );
            exit();
        }
    }

    $URL      = $_POST["URL"];
    $Title    = $_POST["Title"];
    $SubTitle = $_POST["SubTitle"];
    $Playlist = $_POST["Playlist"];
    $TextBody = $_POST["TextBody"];
    $Writer   = $_SESSION['User_Name'];


    //----------------------------------------------// 

    if ($_POST['Mode']=="ADD"){
        $sql="INSERT INTO Youtube (Youtube_date, Youtube_URL, Youtube_Thumbnail, Youtube_Title, Youtube_SubTitle, Youtube_Playlist, Youtube_Text, Youtube_Writer) VALUES (NOW(), '$URL','$Thumbnail', '$Title', '$SubTitle', '$Playlist', '$TextBody', '$Writer');";
    } 
    else if ($_POST['Mode']=="EDIT") { 
        $no = $_POST['Youtube_No'];
        $sql="UPDATE Youtube SET Youtube_URL='$URL'".$A.", Youtube_Title='$Title', Youtube_SubTitle='$SubTitle', Youtube_Playlist='$Playlist', Youtube_Text='$TextBody' WHERE Youtube_No='$no';";
    } 
    else if ($_POST['Mode']=="DEL"){
        $no = $_POST['Youtube_No'];
        $sql = "DELETE FROM Youtube WHERE Youtube_No = $no;";
    }

    //----------------------------------------------// 

    if (mysqli_query($connect, $sql)){
        // echo "레코드 추가 성공";
    } else {
        echo "sql문: ".$sql;
        echo "실패:" .mysqli_error($connect);
    }

    echo "<script type=\"text/javascript\"> location.href='AdminMajorSeries.php'; </script>";
?>