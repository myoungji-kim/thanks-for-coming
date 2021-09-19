	<script type="text/javascript">
		function Insta_Add_File() {
			// console.log(document.getElementById('AddPhoto').style.display);
			for (var num=2; num<=10; num++){
				var Test = document.getElementById('Image'+num);
				// var Test2 = document.getElementById('Image10');

				if (Test.style.display=='none') {
					Test.style.display='block';
					break;
				}

				// if (Test2.style.display=='block') {
				// 	document.getElementById('AddPhoto').style.display = 'none';
				// } 
			}
		}

		function Insta_Save() {
			var GET_NO = "<?=$GET_NO?>";

			if(GET_NO==""){
				if ($('[name=Image1]').val()=="") {
					alert ("사진은 최소 1개 이상 등록해야합니다");
					return false;
				}
			} 
			
			if ($('[name=InstaTitle]').val()=="") {
				alert ("제목을 작성해주세요");
				return false;
			} else if ($('[name=HashTag]').val()=="") {
				alert ("해시태그를 작성해주세요");
				return false;
			} else {
				$('[name=InstaSave]').submit();
			}
		}

		function Insta_Remove(){
			if (confirm("삭제하시겠습니까?")){
				$("#InstaSave").attr("action","InstaSave.php?no=<?=$No?>").submit();
				$('[name=Mode]').val("DEL");
				$('[name=InstaSave]').submit();
			}
		}

	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////


		function Youtube_Save() {
			var GET_NO = "<?=$GET_NO?>";

			if(GET_NO==""){
				if ($('[name=URL]').val()=="") {
					alert ("영상 URL을 입력해주세요");
					return false;
				} else if ($('[name=Thumbnail]').val()=="") {
					alert ("미리보기 사진을 등록해주세요");
					return false;
				}
			}

			if ($('[name=Title]').val()=="") {
				alert ("제목을 입력해주세요");
				return false;
			} else if ($('[name=SubTitle]').val()=="") {
				alert ("소제목을 입력해주세요");
				return false;
			} else if ($('[name=Playlist]').val()=="") {
				alert ("카테고리를 선택해주세요");
				return false;
			} else if ($('[name=TextBody]').val()=="") {
				alert ("본문을 입력해주세요");
				return false;
			} else {
				$('[name=YoutubeSave]').submit();
			}
		}

		function Youtube_Remove(){
			if (confirm("삭제하시겠습니까?")){
				$("#YoutubeSave").attr("action","YoutubeSave.php?no=<?=$No?>").submit();
				$('[name=Mode]').val("DEL");
				$('[name=YoutubeSave]').submit();
			}
		}

	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////

		function Member_Save() {
			var GET_NO = "<?=$GET_NO?>";
			
			var mKakao = $('[name=MemberKakaoID]');

			var mRole  = $('[name=MemberRole]');
			var mName  = $('[name=MemberName]');
			var mSex   = $('[name=MemberSex]:checked');
			var mID    = $('[name=MemberID]');
			var mPW    = $('[name=MemberPW]');
			var mEmail = $('[name=MemberEmail]');

			var formPW = /^(?=.*[a-zA-Z])(?=.*[0-9]).{5,12}$/.test($('[name=MemberPW]').val());  
			var formEmail =/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/.test($('[name=MemberEmail]').val());

			if (mRole.val()=="") {
				alert ("역할을 입력해주세요");
				return false;
			} else if (mRole.val()!="사용자" && mRole.val()!="관리자"){
				alert ("역할은 사용자/관리자 중에 선택해주세요")
			} else if (mName.val()=="") {
				alert ("이름을 입력해주세요");
				return false;
			} else if (mSex.length < 1) {
				alert ("성별을 선택해주세요");
				return false;
			} else if (mID.val()=="" && mKakao.val()=="") {
				alert ("아이디를 입력해주세요");
				return false;
			} else if (mPW.val()=="" && mKakao.val()=="") {
				alert ("비밀번호를 입력해주세요");
				return false;
			} else if (!formPW && mKakao.val()=="") {
				alert ("패스워드 조건 : 영문, 숫자가 최소 1자리 이상이 포함된 5~12자리");
				return false;
			} else if (mEmail.val()=="") {
				alert ("이메일을 입력해주세요");
				return false;
			} else if (!formEmail) {
				alert ("이메일 형식을 지켜주세요");
				return false;
			} else {
				$('[name=MemberSave]').submit();
			}
		}


		function Member_Remove(){
			if (confirm("삭제하시겠습니까?")){
				$("#MemberSave").attr("action","MemberSave.php?no=<?=$No?>").submit();
				$('[name=Mode]').val("DEL");
				$('[name=MemberSave]').submit();
			}
		}

	</script>