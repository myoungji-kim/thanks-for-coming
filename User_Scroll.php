<? include "header.php";?>
	<div id="test" style="height:5000px">
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).bind("scroll", function(){
				$scrollTop    = $(this).scrollTop();
				$scrollHeight = $("body").prop("scrollHeight");
				$windowHeight = $(window).height();

				if($scrollHeight-($scrollTop+$windowHeight)<=1){
					console.log("END");
					$scrollHeight += 5000;
					$("#test").css("height", $scrollHeight);
					console.log($scrollHeight);
				}
			});
		});
		
	</script>
</body>
</html>