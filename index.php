<?php
include('header.php');
?>
<div class="left">

		<h2>Left</h2>
		<ul>
			<li>dd</li>
			<li>ff</li>
			<li>aa</li>
		</ul>
</div>

<div id='search'>
  <ul id="tabs">
  <li><a href="#" title="tab1">Drug</a></li>
  <li><a href="#" title="tab4">Cell Lines</a></li>
  <li><a href="#" title="tab4">Cancer Type</a></li>
  <li><a href="#" title="tab2">Gene</a></li>
  
  
</ul>
<div id='form'>
            <form action="search.php" method='get'>

                <input type="text" id='text' name='name' value="eg. Aspirin" onfocus="if(value=='eg. Aspirin'){value='';style.color='black';style.fontStyle='normal';}" onblur="if(value==''){value='eg. Aspirin';style.color='silver';style.fontStyle='italic';}" />
                <input type="hidden" name='type' id='hidden' value='aaa' />
                <div>

                    <ul class='example'>
                        <li>aaa</li>
                        <li>aaa</li>
                        <li>aaa</li>
                        <li>aaa</li>
                        <li>aaa</li>
                    </ul>
                </div>
                <input type='submit' id='btn' value='Search' />
            </form>
        </div>
</div>

<!-- search tab js -->
<script src="./js/jquery-2.1.1.min.js"></script>
<script>
$(document).ready(function() {

	$("#tabs li:first").attr("id","current"); // Activate first tab

  $("#hidden")[0].value=$("#tabs a:first").html();

    $('#tabs a').click(function(e) {
        e.preventDefault();        
       
        $("#tabs li").attr("id",""); //Reset id's
        $(this).parent().attr("id","current"); // Activate this
         $("#hidden")[0].value=$(this).html();

        // Show content for current tab
    });
});

</script>











<?php
include('footer.php');
?>