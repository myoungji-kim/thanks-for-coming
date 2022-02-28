<? 
      session_start();
      header('Content-Type: text/html; charset=UTF-8'); // 한글 보여주기
      if ($_SERVER['PHP_SELF']!="/AdminLogin.php") {
            if ( $_SESSION['User_Name'] == "" ) {
                  echo "<script type=\"text/javascript\"> alert('로그인이 필요합니다'); location.href='AdminLogin.php'; </script>";
            }
      } else {
            if ( isset($_SESSION['User_Name']) ) {
                  echo "<script type=\"text/javascript\"> alert('이미 접속 중입니다'); location.href='AdminMembers.php'; </script>";
            }
      }
?>