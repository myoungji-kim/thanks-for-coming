<script>
	function showHide(){
        if(document.getElementById("MenuBlackBG").style.display == 'none') {
            document.getElementById("MenuBlackBG").style.display = 'block';
            document.getElementById("MenuBox").style.display     = 'block';
        }
        else {
            document.getElementById("MenuBlackBG").style.display = 'none';
            document.getElementById("MenuBox").style.display     = 'none';
        }
    }

    function showSearchPage(){
    	if(document.getElementById("SearchPage").style.display == 'none') {
            document.getElementById("SearchPage").style.display = 'block';
        }
        else {
            document.getElementById("SearchPage").style.display = 'none';
        }
    }

    function iconChangeVideoBox(){
    	if (document.getElementById("ImgIconExplain").src == "./asset/images/iconExplain_Color.svg")
    	{
    		document.getElementById("ImgIconExplain").src = "./asset/images/iconExplain_Gray.svg";
    	} else if (document.getElementById("ImgIconExplain").src == "./asset/images/iconExplain_Gray.svg")
    	{
    		document.getElementById("ImgIconExplain").src = "./asset/images/iconExplain_Color.svg";
    	}
    }

    function Category(click){
        for (var a=1; a<5; a++){
            if (a == click) {
                console.log(a+"Page");
                console.log(a+"Text");
                document.getElementById(a).style.background     = '#2D2D2D';
                document.getElementById(a+"Text").style.color   = '#FFFFFF';
                document.getElementById(a+"Page").style.display = 'block';
            } else {
                document.getElementById(a).style.background     = '#FFFFFF';
                document.getElementById(a+"Text").style.color   = '#2D2D2D';
                document.getElementById(a+"Page").style.display = 'none';
            }
        }
    }


</script>