<?php
include('header.php');
include('connect.php');
?>
<div class='druginfo'>
	
 <table>
        <tbody>
            <tr>
                <th>drug name:</th>
                <td>name</td>
            </tr>
            <tr>
                <th>description</th>
                <td>love xinyu lovexinyu lovexinyu lovexinyu</td>
            </tr>
            <tr>
                <th>drugbank ID</th>
                <td>name</td>
            </tr>
            <tr>
                <th>pubchem ID</th>
                <td>name</td>
            </tr>
            <tr>
                <th>drug name:</th>
                <td>name</td>
            </tr>
        </tbody>
    </table>

</div>
<hr />
   <div id='result'>
   	<div id="resultHead">
   		<ul class='resultul'>
   			<li><a href='#' >Mutation</a></li>
   			<li><a href='#' >Methylation</a></li>
   			<li><a href='#' >miRNA</a></li>
   			<li><a href='#' >lncRNA</a></li>
   			<li><a href='#' >MSI</a></li>
   		</ul>
   	</div>
   	<div id='resultBody'>
   		<div class="resultInfo" id='Mutation'>
<?php 
$_GET['value']=''
include('drugData.php');

?>
   		</div>
   		<div class="resultInfo" id='Methylation'>
        	<table>
   				<tbody>
   					<tr>
   						<th>geneID</th>
   						<td>id</td>
   					</tr>

   					
   				</tbody>
   			</table>

   		</div>
   		<div class="resultInfo" id='miRNA'>miRNA</div>
   		<div class="resultInfo" id='lncRNA'>lncRNA</div>
   		<div class="resultInfo" id='MSI'>MSI</div>
<!-- 
		<div class="resultInfo" >
   			Mutation
   		</div>
   		<div class="resultInfo" >methylation</div>
   		<div class="resultInfo" >miRNA</div>
   		<div class="resultInfo" >lncRNA</div>
   		<div class="resultInfo" >MSI</div> -->


   	</div>
   </div>



<script src="./js/jquery-2.1.1.min.js"></script>
<script>

$(document).ready(function() {

	$("#resultBody div:first").css({"display":"block"}); // Activate first tab

 

    $('#resultHead a').click(function(e) {
        e.preventDefault();
        
        $(this).parent().css({"background-color":'red' });
        $(this).parent().siblings().css({'background-color':'rgb(214, 224, 238)'})
        $('#' + $(this).html()).css({"display":'block'});         
        $('#' + $(this).html()).siblings().css({display:'none'});  
        

        // Show content for current tab
    });
});

</script>



