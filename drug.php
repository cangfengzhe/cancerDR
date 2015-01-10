<?php
include('header.php');
?>


<style>
	table
  {
  border-collapse:collapse;
  }

table,th, td
  {
  border: 1px solid #ddd;
  }
  th, td{
  	width:200px;
  	height: 50px;
  	text-align: left;
  }
	th{
		background-color: rgb(214, 224, 238);
	}

</style>


<table border="2">
<thead>
	
</thead>
	<tbody>
	<tr>
		<th>name</th>
		<!-- 和并列 -->
		<td rowspan="2">lipidong</td>  
		<td>abcdef</td>
	</tr>
	<tr>
		<th>name</th>
		<td>abcdef</td>
	</tr>
	<tr>
		<th>name</th>
		<td>lipidong</td>
		<td>abcdef</td>
	</tr>
	<tr>
		<th>name</th>
		<td colspan="2">lipidong</td>
		
	</tr>
	</tbody>
</table>





<?php
include('footer.php');
?>