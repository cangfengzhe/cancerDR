<?php
$num = $_GET['num'];
// $num=2;
echo $num;
error_reporting(E_ALL ^ E_DEPRECATED);
	#Include the connect.php file
	include('connect.php');
	#Connect to the database
	//connection String
	// $tableName='tab1';

	$connect = mysql_connect($hostname, $username, $password)
	or die('Could not connect: ' . mysql_error());
	//Select The database
	$bool = mysql_select_db($database, $connect);
	if ($bool === False){
	   print "can't find $database";
	}
$start = ($num-1)*10;
$end = $num*10;
$sql = 'select info_drug.drug_name,info_cell.cell_name, info_gene.gene_Name,info_mutation.mutation, info_ic50.IC50, info_ic50.Z_Score  from info_drug 
left join info_ic50 on  info_drug.drug_id=info_ic50.drug_id 
left join mutation on   mutation.cell_line_id=info_ic50.cell_ID
left join info_mutation on mutation.mut_id = info_mutation.mut_id
left join info_cell on mutation.cell_line_id=info_cell.cell_ID
left join info_gene on mutation.gene_id=info_gene.gene_ID
 
where info_drug.drug_id=1;' . "limit $start , $end;";

$result = mysql_query($sql) or die(mysql_error());
echo '<table><tbody>';
$flag=0;
while($row=mysql_fetch_array($result) ){
   $cellName = $row['cell_name'];
   if ($flag==0){
   	$flag=1;
   	echo
   }




   echo '<tr><th>drugID</th><td>', $row['c'], '</td></tr>';
   echo '<tr><th>drugName</th><td>', $row['drugName'], '</td></tr>';
 // echo '<tr><th>drugbankID</th><td>', $row['drugbankID'], '</td></tr>';
}
echo '</tbody></table>';
?>