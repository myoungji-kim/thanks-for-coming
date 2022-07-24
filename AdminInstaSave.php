<?
    include "Admin_Session.php";
    header('Content-Type: text/html; charset=UTF-8'); // 한글 보여주기

    include "Connect.php";
    include "class.upload.php-master/src/class.upload.php";

     
    // Add Query about Image
    function uploadImage($num) {
        $ImageNum = 'Image_'.$num;
        $ImageNum = new Verot\Upload\Upload($_FILES['Image'.$num]);
        if($ImageNum->uploaded) {
            $ImageNum->file_overwrite = true;
            $ImageNum->image_resize   = true;
            $ImageNum->process($_SERVER["DOCUMENT_ROOT"]."/upload");
            if ($ImageNum->processed) {
                $ImageName = $ImageNum->file_dst_name;
                if ($_POST['Insta_No']!=""){
                    $result=", Insta_Image_".$num."='$ImageName'";
                } else {
                    $result = $ImageName;
                }
            } else {
                echo 'error : ' .( $ImageNum->error );
                exit();
            }
        }
        return $result;
    }

    $ImageInfo = ['', '', '', '', '', '', ''];
    $addSql = '';
    for($i=0; $i<=10; $i=$i+1) {
        $result = uploadImage($i+1);
        $addSql = $addSql.$result;
        $ImageInfo[$i] = $result;
    }
    
    $Title   = $_POST["InstaTitle"];
    $HashTag = $_POST["HashTag"];
    $Writer  = $_SESSION['User_Name'];


    // Decide Query
    if ($_POST['Mode']=="ADD"){
        $sql="INSERT INTO Insta (Insta_date, Insta_Title, Insta_Text, Insta_Image_1, Insta_Image_2, Insta_Image_3, Insta_Writer) VALUES (NOW(), '$Title','$HashTag', '$ImageInfo[0]', '$ImageInfo[1]', '$ImageInfo[2]', '$Writer');";
    } 
    else if ($_POST['Mode']=="EDIT"){
        $no = $_POST['Insta_No'];
        $sql="UPDATE Insta SET Insta_Title='$Title', Insta_Text='$HashTag'".$addSql." WHERE Insta_No=$no;";
    }
    else if ($_POST['Mode']=="DEL"){
        $no = $_POST['Insta_No'];
        $sql = "DELETE FROM Insta WHERE Insta_No = $no;";
    } 


    // Query Result   
    if (mysqli_query($connect, $sql)){
        // echo "레코드 추가 성공";
    } else {
        echo "실패:" .mysqli_error($connect);
    }


    // Move Page
    echo "<script type=\"text/javascript\"> location.href='AdminMZSeries.php'; </script>";    
?>


