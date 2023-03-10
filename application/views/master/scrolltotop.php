<script>

$(document).ready(function(e) {


// When the user scrolls down 400px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
        document.getElementById("topBtn").style.display = "block";
    } else {
		document.getElementById("topBtn").style.display = "none";
    }
}

	$("#topBtn").click(function() {
	$("html, body").animate({ scrollTop: 0 }, "slow");
	return false;
	});

    
});

</script>


<div class="top">
	<a><i id="topBtn" title="Go To Top" class="fa fa-chevron-circle-up" style="font-size:40px; color:rgba(0,0,0,0.5); display:none; transition:0.5s;"></i></a>
</div>
