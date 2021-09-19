<?php

if ($_FILES["upload"]["size"] > 0 ){

    // 현재시간 추출
    $date_filedir    = date("YmdHis");
 
    //오리지널 파일 이름.확장자
    $ext = substr(strrchr($_FILES["upload"]["name"],"."),1);
    $ext = strtolower($ext);
    $savefilename = $date_filedir.".".$ext;
  
    $uploadpath  = $_SERVER['DOCUMENT_ROOT'].$SET_UPLOAD_EDITOR;
    $uploadsrc = $SITE_DOMAIN.$SET_UPLOAD_EDITOR."/";
    $http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') ? 's' : '') . '://';

    if(move_uploaded_file($_FILES['upload']['tmp_name'],$uploadpath."/".iconv("UTF-8","EUC-KR",$savefilename))){

        $uploadfile = $savefilename;
        $arrTmp['uploaded'] = 1;
        $arrTmp['fileName'] = $savefilename;
        $arrTmp['url'] = $uploadsrc."/".$savefilename;
        //echo "<script type='text/javascript'>alert('업로드성공: ".$savefilename."');</script>;";

        echo json_encode($arrTmp);
    }
 
}else{
    exit;
}



//  {
//     "uploaded": 1,
//     "fileName": "foo.jpg",
//     "url": "/files/foo.jpg"
// }
?>