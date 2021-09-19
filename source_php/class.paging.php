<?php


class paging{

		/*$limit 한페이지 출력갯수
		$block 페이지 출력갯수
		$page 현재 페이지
		$t_cnt 총 게시물수
		$pre_next prev, next버튼 이미지 / text
		$seper 구분자
		$url
		$pagevalue 페이지 변수


		사용방법 예제
		페이지 번호가 출력되야하는 부분에 코딩
		<?php 
		$pagego= new paging;
		$pagego->pagelink($페이지랑리스트수,$블록수,$페이지번호,$게시물총수,$링크url,$추가파라미터);
		?>


		*/

        function pagelink($limit,$block,$page,$t_cnt, $url, $addurl="", $pagevalue="page", $marker="") {
			if ($t_cnt > 0) {
				if (@$pre_btn == "") @$pre_btn = "prev";
				if (@$next_btn == "") @$next_btn = "next";

				// 마지막 페이지 내용만 출력하기
				$sum_page = ceil($t_cnt/$limit); //총 페이지 수
				if ($page==$sum_page) { $pageing=(($sum_page-1)*$limit); $limit= ($t_cnt - $pageing);} //마지막 페이지 출력갯수 구하기
				// 페이징 부분 변수 설명
				$lo_value = ceil($page/$block);       // 위치값 //
				$lo_start = ($block*($lo_value-1))+1; // 블럭 시작값 //
				$lo_end = ($block*$lo_value);         // 블럭 끝값 //
				$next_block = $lo_end+1;              // 다음 블럭 //
				$prev_block = $lo_end-$block;         // 이전 블럭 //
				$lo_block = $lo_value*$block;         // 현재 블럭값 //
				$bp = $page-1;  //이전페이지
				$np = $page+1; //다음페이지
				$total_page=intval($t_cnt/$limit); //총페이지

				if(ereg("\?",$url)) {
					$tmpflag = "&";
				}else{
					$tmpflag = "?";
				}



		//-----------------------------------------------------------------------------------------------------------------------------//
	//			echo "<div class='pagecont'>";
				// if ($page<$block || $page==$block) {
				// 	echo '<a href="#" class="bic">처음</a>';
				// } else {
				// 	echo '<a href="'.$url$tmpflag$pagevalue=$prev_block$marker.'" class="bic">처음</a>';
				// }

				echo "<ul>";

				if($page != 1) {
					// echo '<li><a href="'.$url.$tmpflag.$pagevalue.'='."1".$marker.$addurl.'">처음</a></li>';
					echo '<li><a href="'.$url.$tmpflag.$pagevalue.'='.($page-1).$marker.$addurl.'"><</a></li>';
				} else {
					echo '<li><a href="javascript://"><</a></li>';
				}

				if ($lo_block>$sum_page || $lo_block==$sum_page)
				{
						for ($i=$lo_start; $i<=$sum_page; $i++)
						{
							$tmp_cur = "";
							if ($page==$i) $tmp_cur = " class='selected' ";
							echo '<li><a '.$tmp_cur.'href="'.$url.$tmpflag.$pagevalue."=".$i.$marker.$addurl.'">'.$i.'</a></li>';
						}
				} else {
						for ($i=$lo_start; $i<$lo_end+1; $i++)
						{
							$tmp_cur = "";
							if ($page==$i) $tmp_cur = " class='selected' ";
							echo '<li><a '.$tmp_cur.' href="'.$url.$tmpflag.$pagevalue."=".$i.$marker.$addurl.'">'.$i.'</a></li>';
						}
				}

				if($sum_page > $page) {
					echo '<li><a href="'.$url.$tmpflag.$pagevalue.'='.($page+1).$marker.$addurl.'">></a></li>';
					// echo '<li><a href="'.$url.$tmpflag.$pagevalue.'='.$sum_page.$marker.$addurl.'">마지막</a></li>';
				} else {
					echo '<li><a href="javascript://">></a></li>';
				}

				echo "</ul>";


				if ($next_block <= $sum_page) {
					//echo "...<span class='num'><a href=\"$url$tmpflag$pagevalue=$sum_page\">$sum_page</a></span>";
					//echo "<a href=\"$url$tmpflag$pagevalue=$next_block$marker\"><img src='/images/bbs/btn_next2.gif'  style='margin:0px;'/></a>";
				} else {
					//echo "<img src='/images/bbs/btn_next2.gif'  style='margin:0px;'/>";
				}
	//			echo "</div>";

			}
  		}



}

?>
