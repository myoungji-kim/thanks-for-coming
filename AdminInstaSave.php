<?
    include "Admin_Session.php";
    header('Content-Type: text/html; charset=UTF-8'); // 한글 보여주기

    include "Connect.php";

    $sql="SELECT * FROM Insta;";
    $result=mysqli_query($connect,$sql);

    include "class.upload.php-master/src/class.upload.php";

    //----------------------------------------------// 
    
    $Image_1 = new Verot\Upload\Upload($_FILES['Image1']);
    if($Image_1->uploaded) {
        $Image_1->file_overwrite = true;
        $Image_1->image_resize   = true;
        $Image_1->process($_SERVER["DOCUMENT_ROOT"]."/upload");
        if ($Image_1->processed) {
            $Image1 = $Image_1->file_dst_name;
            if ($_POST['Insta_No']!=""){
                $A=", Insta_Image_1='$Image1'";
            }
        } else {
            echo 'error : ' .( $Image_1->error );
            exit();
        }
    }

    $Image_2 = new Verot\Upload\Upload($_FILES['Image2']);
    if($Image_2->uploaded) {
        $Image_2->file_overwrite = true;
        $Image_2->image_resize   = true;
        $Image_2->process($_SERVER["DOCUMENT_ROOT"]."/upload");
        if ($Image_2->processed) {
            $Image2 = $Image_2->file_dst_name;
            if ($_POST['Insta_No']!=""){
                $B=", Insta_Image_2='$Image2'";
            }
        } else {
            echo ( $Image_2->error );
            exit();
        }
    } else {
        $Image_2 = "NULL";
    }

    $Image_3 = new Verot\Upload\Upload($_FILES['Image3']);
    if($Image_3->uploaded) {
        $Image_3->file_overwrite = true;
        $Image_3->image_resize   = true;
        $Image_3->process($_SERVER["DOCUMENT_ROOT"]."/upload");
        if ($Image_3->processed) {
            $Image3 = $Image_3->file_dst_name;
            if ($_POST['Insta_No']!=""){
                $C=", Insta_Image_3='$Image3'";
            }
        } else {
            echo 'error : ' .( $Image_3->error );
            exit();
        }
    } else {
        $Image_3 = "";
    }

    $Title   = $_POST["InstaTitle"];
    $HashTag = $_POST["HashTag"];
    $Writer  = $_SESSION['User_Name'];


    //----------------------------------------------// 

    if ($_POST['Mode']=="ADD"){
        $sql="INSERT INTO Insta (Insta_date, Insta_Title, Insta_Text, Insta_Image_1, Insta_Image_2, Insta_Image_3, Insta_Writer) VALUES (NOW(), '$Title','$HashTag', '$Image1', '$Image2', '$Image3', '$Writer');";
    } 
    else if ($_POST['Mode']=="EDIT"){
        $no = $_POST['Insta_No'];
        $sql="UPDATE Insta SET Insta_Title='$Title', Insta_Text='$HashTag'".$A.$B.$C."WHERE Insta_No=$no;";
    }
    else if ($_POST['Mode']=="DEL"){
        $no = $_POST['Insta_No'];
        $sql = "DELETE FROM Insta WHERE Insta_No = $no;";
    } 

    //----------------------------------------------// 
        
    if (mysqli_query($connect, $sql)){
        // echo "레코드 추가 성공";
    } else {
        echo "실패:" .mysqli_error($connect);
    }

    echo "<script type=\"text/javascript\"> location.href='AdminMZSeries.php'; </script>";

    //----------------------------------------------// 

    
    
    
?>


