
<!-- 명지 개별페이지 코딩 -->

<? if (isset($_GET["pg"])){
	$pg_for_block = (ceil($_GET["pg"]/10)-1)*10;
	for ($PageNum=$pg_for_block+1; $PageNum<=$pg_for_block+10; ++$PageNum){ ?>
		<span> <a href="AdminMembers.php?pg=<?=$PageNum?>"> <?=$PageNum?> </a> </span>
        <? 
        	$StartPage = $pg_for_block+1;
            $LastPage = $PageNum;
            if($LastPage>=$AllPage){ break; }
    }
} else {
		for ($PageNum=1; $PageNum<=10; ++$PageNum){ ?>
        	<span> <a href="AdminMembers.php?pg=<?=$PageNum?>"> <?=$PageNum?> </a> </span>
            <? 
               $LastPage = $PageNum;
               if($LastPage>=$AllPage){ break; }
        }
} ?>



<!-- 명지 블록 이전/다음 버튼 --> 
<? if($PageNum>11){ ?> 
    <a href="AdminMembers.php?pg=<?=$StartPage-1;?>"> 이전 </a> 
<? } ?> 

<? if(($CountPost-(($PageNum-10)*10))>10 && $PageNum>10){ ?>
    <a href="AdminMembers.php?pg=<?=$LastPage+1;?>"> 다음 </a>
<? } ?>