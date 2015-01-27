<?php
// header('Content-type: application/json');
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
	

$sql_drug = 'select distinct  drug_id from meth_view';
$sql_gene = 'select distinct gene_id from meth_view';
$sql_both= 'select distinct drug_id, gene_id from meth_view';

$result_drug = mysql_query($sql_drug);
$drug_node=null;
while($rows = mysql_fetch_array($result_drug)){
	$drug_node[]=array(
		'data' => array('id'=>'d' . $rows['drug_id'],'weight'=>'1'),
		'css' => array('background-color' => 'green',
						'content' => $rows['drug_id'],
						'text-valign' => 'center')

		);
}

$result_gene = mysql_query($sql_gene);
$gene_node=null;
while($rows = mysql_fetch_array($result_gene)){
	$gene_node[]=array(
		'data' => array('id'=>'g' . $rows['gene_id'],'weight'=>'1'),
		'css' => array('background-color' => 'red')

		);
}

$result_both = mysql_query($sql_both);
$edges=null;
$ii = 0;
while($rows = mysql_fetch_array($result_both)){
	$ii++;
	$edges[]=array(
		'data' => array('id'=>'e' . $ii,
						'source'=>'d' . $rows['drug_id'],
						'target' => 'g' . $rows['gene_id'])


		);
	
}

$data[]=array('nodes' => array_merge($gene_node,$drug_node),
				'edges' => $edges);
echo json_encode($data);
mysql_close();
?>