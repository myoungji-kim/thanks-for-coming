<!DOCTYPE html>
<html>
  <head>
      <title> Kim DDing Ji </title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="user-scalable=no, width=800">
      <meta name="google-site-verification" content="EBWVlt9UKAo5kb3JFlCqSdRF14f0cLXgws_kOjLW6gE" />
      <meta name="naver-site-verification" content="a954ae14ef5b21504685d492f4e3142a8c84efde" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta property="og:url" content="">
      <meta property="og:type" content="website">
      <meta property="og:title" content="">
      <meta name="keywords" content="">
      <meta property="og:description" content="">
      <meta property="og:image" content="">
      <meta name="description" content="">
      <link rel="shortcut icon" href="">
      <link rel="stylesheet" type="text/css" href="./asset/css/reset.css" data-youshallnotparse="true"/>
      <link rel="stylesheet" type="text/css" href="./asset/css/common.css" />
      <link rel="stylesheet" type="text/css" href="./asset/css/media.css" />
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
      <script type ="text/javascript" src="./asset/script/jquery-3.5.1.min.js"> </script>
      <link rel="stylesheet" type ="text/css" href="./asset/script/jquery-ui-1.12.1.custom/jquery-ui.css"> 
      <script type ="text/javascript" src="./asset/script/jquery-ui-1.12.1.custom/jquery-ui.js"> </script>
  </head>
  <script type ="text/javascript">
      $.datepicker.setDefaults({
        dateFormat: 'yymmdd',
        prevText: '이전 달',
        nextText: '다음 달',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        showMonthAfterYear: true,
        yearSuffix: '년'
    });

      $(function() {
          $("#fromDate").datepicker();
          $("#toDate").datepicker();
      } );

      function SearchHit(){
            if ($("#fromDate").val()=="" && $("#toDate").val()!="") {
                  alert("시작일을 선택해주세요");
            } else if ($("#fromDate").val()!="" && $("#toDate").val()=="") {
                  alert("종료일을 선택해주세요");
            } else {
               document.SerachHitRank.submit();   
            }
      }
</script>
