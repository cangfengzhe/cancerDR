<?php
include 'header.php';

?>
<div class='foreword'><h1>welcome to submit your research data</h1>
<p>The expansion of the database will be continued done with involving the information of the chemoresistance in cancer resulted from some downstream factors, such as the regulation of signal transduction pathways and tumor apoptosis. In a meanwhile, any scientific communities will be welcome to submit relevant data. Before adding to CDRIC, all entries will be scrutinized by our team. If you have problems or questions about the submission procedures, please contact us in the “Contact” page, and we will quickly get back to you. Please submit the data using the following form, asterisk (*) indicates required fields.</p>
</div>
<form id='submit' action="receive.php" method="post">
	<table border=1>
	<tr>
			<th colspan="2">Drug Resistance Infomation</th>
		</tr>
		<tr>
			<td>Disease Name <span class='star'>*</span></td>
			<td><input class="noempty"  name='disease' type="text" /></td>
		</tr>
		<tr>
			<td>Cell Line Name</td><td><input name='cell' type="text"/></td>
		</tr>
		<tr>
			<td>Drug Name<span class='star'>*</span></td>
			<td><input class="noempty" name="drug" type="text"/></td>
		</tr>
		<tr>
			<td>Gene/Transcript<span class='star'>*</span></td>
			<td><input class="noempty" name="gene" type="text"/></td>
		</tr>

		<tr>
			<td>Detail<span class='star'>*</span></td>
			<td><textarea class="noempty" name='detail' type="text"></textarea></td>
		</tr>
		<tr>
			<td>Author, Title, Journal, Year<span class='star'>*</span></td>
			<td><textarea class="noempty" name='journal' type="text"></textarea></td>
		</tr>
		<tr>
			<th colspan="2">Contributor Infomation</th>
		</tr>
		<tr>
			<td>Name<span class='star'>*</span></td>
			<td><input class="noempty" name='author' type="text"/></td>
		</tr>
		<tr>
			<td>Affiliation<span class='star'>*</span></td>
			<td><input class="noempty" name='affiliation' type="text"/></td>
		</tr>
		<tr>
			<td>Email Address<span class='star'>*</span></td>
			<td><input class="noempty" name="email" type="text"/></td>
		</tr>
		<tr>
			<th colspan="2"><input id='butn' type="submit" value='submit' /></th>
		</tr>


	</table>
</form>


<script>
	$(function(){
		$('#left').css('visibility','visible');
		$(':submit[id=butn]').click(function(event) {
			/* Act on the event */
			$('.noempty').each(function(){
				if($(this).val()==''){
					// alert($(this).siblings()[0].text+'is not null');
					alert($(this).parent().prev('td').text()+' should not be empty!');
					event.preventDefault();
					$(this).focus();
					return false;
				}
			})
		});
	})
</script>

<?php
include 'footer.php';
?>