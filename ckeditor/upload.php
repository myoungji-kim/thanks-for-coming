<?php

$SET_UPLOAD_EDITOR="/upload";

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
 
    //php 파일업로드하는 부분
    if($ext=="jpg" or $ext=="gif" or $ext =="png"){
        if(move_uploaded_file($_FILES['upload']['tmp_name'],$uploadpath."/".iconv("UTF-8","EUC-KR",$savefilename))){
            $uploadfile = $savefilename;
            //echo "<script type='text/javascript'>alert('업로드성공: ".$savefilename."');</script>;";
        }
    }else{
        echo "<script type='text/javascript'>alert('jpg,gif,png파일만 업로드가능합니다.');</script>;";
    }
 
}else{
    exit;
 
}
 
echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction({$_GET['CKEditorFuncNum']}, '".$uploadsrc."$uploadfile');</script>;";
 
?>